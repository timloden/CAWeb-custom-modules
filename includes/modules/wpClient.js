const WPAPI = {    
    allPosts: window.location.hostname + '/wp-json/wp/v2/posts',
	publications: window.location.hostname + '/wp-json/wp/v2/publications',
	attachments: window.location.hostname + '/wp-json/wp/v2/media?parent=',
       
}
export default WPAPI