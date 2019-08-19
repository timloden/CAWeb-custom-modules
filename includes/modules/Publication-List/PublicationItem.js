import React, { Fragment } from 'react';
import WPAPI from '../wpClient';

class PublicationItem extends React.Component {
  
  render () {
    let posts = this.props.posts;

    let limit = this.props.limit;

    let postLoop = posts.slice(0, limit).map((post, index)=> {
      
      let id = post.id;
      
      return (
        <article key={index} className="pub-item">
            <div className="thumbnail"></div>
            <div className="pub-body">
                <span className="pub-title">{post.title.rendered}</span> <span class="pub-language">( <a href="">PDF</a>) | <span className="pub-revision-date"> <time datetime="">{post.modified}</time></span>)</span>
                <div className="pub-tags"></div>
            </div>
        </article>
      )
    });

    return (
      <Fragment>
        {postLoop}
      </Fragment>
    )
  }
}

export default PublicationItem;