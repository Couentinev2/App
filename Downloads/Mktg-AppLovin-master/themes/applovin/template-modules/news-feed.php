<?php $current_language = pll_current_language(); ?>

<section id="stories" class="bg-[#181625]">
    <div class="wrapper">
        <div class="max-w-[1000px] mx-auto grid gap-[48px]">
            <h3 class="avenier-black text-center text-white m-0"><?php the_field('subhead_news'); ?></h3>
            <div id="news-feeds" class="grid gap-[24px] sm:grid-cols-1 md:grid-cols-2">
                <!-- Feeds will be injected here by JavaScript -->
            </div>
            <div id="news-pagination" class="flex justify-center items-center space-x-2">
                <!-- Pagination links will be injected here by JavaScript -->
            </div>
        </div>
    </div>
</section>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    document.addEventListener('DOMContentLoaded', function() {
        const feedsPerPage = 6;
        let currentPage = 1;
        const currentLanguage = '<?php echo $current_language; ?>'; // Pass the PHP variable to JavaScript

        function displayFeeds(page) {
            fetch(`/wp-json/custom/v1/news_links?page=${page}&posts_per_page=${feedsPerPage}&lang=${currentLanguage}`)
                .then(response => response.json())
                .then(data => {
                    const feedContainer = document.getElementById('news-feeds');
                    feedContainer.innerHTML = '';

                    data.posts.forEach(feed => {
                        const feedElement = document.createElement('a');
                        feedElement.href = feed.link;
                        feedElement.target = '_blank';
                        feedElement.classList.add('block', 'bg-[#252A3A]', 'px-[32px]', 'py-[24px]', 'rounded-[16px]');
                        const formattedDate = new Date(feed.date).toLocaleDateString('en-US', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });
                        feedElement.innerHTML = `
                            <div class="grid gap-[8px]">
                                <div class="!text-[14px] m-0 avenier-heavy text-[#929BBA]">${feed.source} - <span class="avenier-light">${formattedDate}</span></div>
                                <div class="text-[18px] font-bold mb-2 text-white">${feed.title}</div>
                            </div>
                        `;
                        feedContainer.appendChild(feedElement);
                    });

                    displayPagination(data.total_pages);
                })
                .catch(error => console.error('Error fetching feeds:', error));
        }

        function displayPagination(totalPages) {
            const paginationContainer = document.getElementById('news-pagination');
            paginationContainer.innerHTML = '';

            const createPageButton = (pageNumber) => {
                const pageLink = document.createElement('button');
                pageLink.innerText = pageNumber;
                pageLink.classList.add('pl-[24px]', '!pr-0', 'text-[18px]', 'py-0', 'transition', 'text-white', 'disabled:opacity-50', '!m-0', '!leading-normal', 'pt-[4px]');
                if (pageNumber === currentPage) {
                    pageLink.disabled = true;
                }
                pageLink.addEventListener('click', () => {
                    currentPage = pageNumber;
                    displayFeeds(currentPage);
                });
                paginationContainer.appendChild(pageLink);
            };

            // Add "Previous" button with SVG
            const prevButton = document.createElement('button');
            prevButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M7 1.0752L1 6.7002L7 12.3252" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
            prevButton.classList.add('pl-[24px]', '!pr-0', 'text-[18px]', 'py-0', 'transition', 'text-white', 'disabled:opacity-50', '!m-0', '!leading-normal');
            if (currentPage === 1) {
                prevButton.disabled = true;
            }
            prevButton.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    displayFeeds(currentPage);
                }
            });
            paginationContainer.appendChild(prevButton);

            // Pagination logic
            if (totalPages <= 6) {
                for (let i = 1; i <= totalPages; i++) {
                    createPageButton(i);
                }
            } else {
                if (currentPage <= 3) {
                    createPageButton(1);
                    createPageButton(2);
                    createPageButton(3);
                    if (currentPage === 3) {
                        createPageButton(4);
                    }
                    const ellipsis = document.createElement('span');
                    ellipsis.innerText = '...';
                    ellipsis.classList.add('!m-0', 'pl-[24px]', 'text-white');
                    paginationContainer.appendChild(ellipsis);
                    createPageButton(totalPages);
                } else if (currentPage > 3 && currentPage < totalPages - 3) {
                    createPageButton(1);
                    const ellipsisStart = document.createElement('span');
                    ellipsisStart.innerText = '...';
                    ellipsisStart.classList.add('!m-0', 'pl-[24px]', 'text-white');
                    paginationContainer.appendChild(ellipsisStart);
                    createPageButton(currentPage - 1);
                    createPageButton(currentPage);
                    createPageButton(currentPage + 1);
                    const ellipsisEnd = document.createElement('span');
                    ellipsisEnd.innerText = '...';
                    ellipsisEnd.classList.add('!m-0', 'pl-[24px]', 'text-white');
                    paginationContainer.appendChild(ellipsisEnd);
                    createPageButton(totalPages);
                } else {
                    createPageButton(1);
                    const ellipsis = document.createElement('span');
                    ellipsis.innerText = '...';
                    ellipsis.classList.add('!m-0', 'pl-[24px]', 'text-white');
                    paginationContainer.appendChild(ellipsis);
                    for (let i = totalPages - 3; i <= totalPages; i++) {
                        createPageButton(i);
                    }
                }
            }

            // Add "Next" button with SVG
            const nextButton = document.createElement('button');
            nextButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M1 1.0752L7 6.7002L1 12.3252" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
            nextButton.classList.add('pl-[24px]', '!pr-0', 'text-[18px]', 'py-0', 'transition', 'text-white', 'disabled:opacity-50', '!m-0', '!leading-normal');
            if (currentPage === totalPages) {
                nextButton.disabled = true;
            }
            nextButton.addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    displayFeeds(currentPage);
                }
            });
            paginationContainer.appendChild(nextButton);
        }

        displayFeeds(currentPage);
    });
</script>
