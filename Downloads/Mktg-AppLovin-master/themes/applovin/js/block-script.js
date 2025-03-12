// based on solution by C. Cooper: https://wordpress.stackexchange.com/questions/339436/removing-panels-meta-boxes-in-the-block-editor/339437#339437
wp.data.dispatch( "core/edit-post").removeEditorPanel( "taxonomy-panel-category" ) ; // category
//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'taxonomy-panel-TAXONOMY-NAME' ) ; // custom taxonomy
wp.data.dispatch( "core/edit-post").removeEditorPanel( "taxonomy-panel-post_tag" ); // tags
//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'featured-image' ); // featured image
//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'post-link' ); // permalink
//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'page-attributes' ); // page attributes
wp.data.dispatch( "core/edit-post").removeEditorPanel( "post-excerpt" ); // Excerpt
wp.data.dispatch( "core/edit-post").removeEditorPanel( "discussion-panel" ); // Discussion
//wp.data.dispatch( 'core/edit-post').removeEditorPanel( 'template' ); // Template