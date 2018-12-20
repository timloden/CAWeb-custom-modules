// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class ProfileBanner extends Component {

	static slug = 'cacm_profile_banner';

	renderImage() {
		if (this.props.portrait_url) {

			if (this.props.round_image) {
				return (
					<div class="profile-banner-img-wrapper"><img src={this.props.portrait_url} alt={this.props.portrait_alt} style={{width: 90, minWidth: 90, float: 'right'}} /></div>
				);

			} else {
				return (
					<img src={this.props.portrait_url} alt={this.props.portrait_alt} style={{width: 90, minWidth: 90, float: 'right'}} />
				);
			}
		}
	}

	
	renderLink() {
		if (this.props.profile_link) {
			return (
				<div class="banner-link"><a href={this.props.url}>{this.props.profile_link}</a></div>
			);
		}
	}

	render() {
	    return (
			<Fragment>
				<div className={"profile-banner " + (this.props.round_image ? 'round-image' : '')}>
			    	{this.renderImage()}
			        <div class="banner-subtitle">{this.props.job_title}</div>
			        <div class="banner-title">{this.props.name}</div>
			        {this.renderLink()}
			    </div>
	      	</Fragment>
	    );
	}

}

export default ProfileBanner;
