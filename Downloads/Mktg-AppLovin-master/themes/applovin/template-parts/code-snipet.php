<style type="text/css">
.code-snippet {
    font-family: Arial, sans-serif;
background-color: #F7F8FC;
    padding: 40px;
    margin: 20px 0 ;
    border-radius: 16px ;
}

.code-snippet .dark-mode {
    background-color: #333;
    color: #ccc;
}

.code-snippet-inner{
    background-color: #F7F8FC;
    color: #abb2bf;

    overflow-x: auto;
}

.code-snippet.dark-mode  {
    background-color: #444;
}

.dark-mode .code-snippet-inner  {
    background-color: #444;
}


pre {
    margin: 0;
}

.language {
    color: #000000;
}

.language .keyword { color: #c678dd; } 
.language .string { color: #e5c07b; } 


.dark-mode .language {color: #fff}

#toggleTheme {
    background: url('/wp-content/themes/applovin/images/half-circle-svgrepo.svg') no-repeat center;
    border: none;
    width: 18px; 
    height: 18px;
    cursor: pointer;
        position: absolute;
    right: -20px;
    top: -20px;
    transition: filter 0.3s ease;
    z-index: 9;

}
.code-snippet.dark-mode #toggleTheme {
    filter: invert(100%);
}

.code-snippet-inner pre, .code-snippet-inner code {
    /* max-width: 100%; */
    width: 100%;
    overflow: visible;
    display: block;
    white-space: pre-wrap; /* Add this line */
}
</style>

<div class="code-snippet">
            <div class="toggle-container">
        <button id="toggleTheme"></button>
    </div>

    <div class="code-snippet-inner">

        <pre><code class="language"><?php the_field('code'); ?></code></pre>
    </div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
document.getElementById('toggleTheme').addEventListener('click', function() {
    var element = document.querySelector('.code-snippet');
    element.classList.toggle('dark-mode');
});
</script>
