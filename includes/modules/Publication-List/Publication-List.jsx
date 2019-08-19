// External Dependencies
import React, { Component, Fragment } from 'react';

import WPAPI from '../wpClient';
import PublicationItem from './PublicationItem';

// Internal Dependencies
import './style.css';


class PublicationList extends Component {

	static slug = 'et_pb_ca_publication_list';

	constructor () {
	    super();
	    this.state = {
	      publications: []
	    }
	}

	componentDidMount (){

	    const publicationUrl = WPAPI.publications;

		fetch(publicationUrl)
	    .then(response => response.json())
	    .then(response => {
	    	this.setState({
	    		publications: response
	    	})
	    })
	}

	render() {
	    return (
			<Fragment>
				<p className="publication-title">{this.props.title}</p>
				
                <p className="publication-description">{this.props.content}</p>
                <div className="publication-list">
                   <PublicationItem posts={this.state.publications} limit={this.props.post_count} />
                </div>
	        	
	      	</Fragment>
	    );
	}

}

export default PublicationList;
