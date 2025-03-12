<?php $current_language = pll_current_language(); ?>

<section class="bg-[#EEF0F6]">
    <div class="wrapper">
        <div class="max-w-[1000px] mx-auto grid gap-[48px]">
            <h3 class="avenier-black text-center text-black m-0"><?php echo pll__('Press Releases'); ?></h3>
            <div id="feeds" class="grid gap-6 sm:grid-cols-1 md:grid-cols-2">
                <!-- Feeds will be injected here by JavaScript -->
            </div>
            <div id="pagination" class="flex justify-center items-center space-x-2">
                <!-- Pagination links will be injected here by JavaScript -->
            </div>
        </div>
    </div>
</section>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    const feeds = [];
    const feedsPerPage = 6;
    let currentPage = 1;
    const currentLanguage = '<?php echo $current_language; ?>';

    function displayFeeds(page) {
        const feedContainer = document.getElementById('feeds');
        feedContainer.innerHTML = '';

        const start = (page - 1) * feedsPerPage;
        const end = start + feedsPerPage;
        const pageFeeds = feeds.slice(start, end);

        pageFeeds.forEach(feed => {
            const feedElement = document.createElement('a');
            feedElement.href = feed.link;
            feedElement.target = '_blank';
            feedElement.classList.add('block', 'bg-[#ffffff]', 'px-[32px]', 'py-[24px]', 'rounded-[16px]');
            const formattedDate = new Date(feed.date).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            feedElement.innerHTML = `
                <div class="grid gap-[8px]">
                    <p class="!text-[14px] m-0 avenier-light text-[#929BBA]">${formattedDate}</p>
                    <div class="text-[18px] font-bold mb-2 text-black">${feed.title}</div>
                </div>
            `;
            feedContainer.appendChild(feedElement);
        });

        displayPagination();
    }

    function displayPagination() {
        const paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = '';

        const totalPages = Math.ceil(feeds.length / feedsPerPage);

        // Pagination logic
        const createPageButton = (pageNumber) => {
            const pageLink = document.createElement('button');
            pageLink.innerText = pageNumber;
            pageLink.classList.add('pl-[24px]', '!pr-0', 'text-[18px]', 'py-0', 'transition', 'text-black', 'disabled:opacity-50', '!m-0', '!leading-normal', 'pt-[4px]');
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
        prevButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M7 1.0752L1 6.7002L7 12.3252" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
        prevButton.classList.add('pl-[24px]', '!pr-0', 'text-[18px]', 'py-0', 'transition', 'text-black', 'disabled:opacity-50', '!m-0', '!leading-normal');
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

        if (totalPages <= 3) {
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
                ellipsis.classList.add('!m-0', 'pl-[24px]', 'text-black');
                paginationContainer.appendChild(ellipsis);
                createPageButton(totalPages);
            } else if (currentPage > 3 && currentPage < totalPages - 3) {
                createPageButton(1);
                const ellipsisStart = document.createElement('span');
                ellipsisStart.innerText = '...';
                ellipsisStart.classList.add('!m-0', 'pl-[24px]', 'text-black');
                paginationContainer.appendChild(ellipsisStart);
                createPageButton(currentPage - 1);
                createPageButton(currentPage);
                createPageButton(currentPage + 1);
                const ellipsisEnd = document.createElement('span');
                ellipsisEnd.innerText = '...';
                ellipsisEnd.classList.add('!m-0', 'pl-[24px]', 'text-black');
                paginationContainer.appendChild(ellipsisEnd);
                createPageButton(totalPages);
            } else {
                createPageButton(1);
                const ellipsis = document.createElement('span');
                ellipsis.innerText = '...';
                ellipsis.classList.add('!m-0', 'pl-[24px]', 'text-black');
                paginationContainer.appendChild(ellipsis);
                for (let i = totalPages - 3; i <= totalPages; i++) {
                    createPageButton(i);
                }
            }
        }

        // Add "Next" button with SVG
        const nextButton = document.createElement('button');
        nextButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="8" height="14" viewBox="0 0 8 14" fill="none"><path d="M1 1.0752L7 6.7002L1 12.3252" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
        nextButton.classList.add('pl-[24px]', '!pr-0', 'text-[18px]', 'py-0', 'transition', 'text-black', 'disabled:opacity-50', '!m-0', '!leading-normal');
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

    // Fetch feeds from your API and initialize the feed array
    fetch(`/wp-json/main-api/v1/all-feeds?lang=${currentLanguage}`)
        .then(response => response.json())
        .then(data => {
            console.log('API Response:', data);
            if (Array.isArray(data)) {
                feeds.push(...data);
                displayFeeds(currentPage);
            } else {
                console.error('Expected array but got:', data);
            }
        })
        .catch(error => console.error('Error fetching feeds:', error));
</script>