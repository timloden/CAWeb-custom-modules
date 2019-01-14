// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class ProfileBanner extends Component {

	static slug = 'cacm_profile_banner';

	renderLink() {
		if (this.props.profile_link) {
			return (
				<div className="banner-link"><a href={this.props.url}>{this.props.profile_link}</a></div>
			);
		}
	}

	renderImage() {
		if (this.props.portrait_url) {
			return(
				<div className="inner" style={{backgroundImage: "url(" + this.props.portrait_url + ")", backgroundRepeat: 'no-repeat', backgroundPosition: 'right bottom' }}>
				 	<div className="banner-subtitle">{this.props.job_title}</div>
				    <div className="banner-title">{this.props.name}</div>
				    {this.renderLink()}
				</div>
			);
			
		} else {
			if (this.props.gender === 'male') {
				return(
					<div className="inner" style={{backgroundImage: "url(/wp-content/themes/CAWeb-Standard/images/banner/banner-guy.png)", backgroundRepeat: 'no-repeat', backgroundPosition: 'right bottom' }}>
						<div className="banner-subtitle">{this.props.job_title}</div>
					    <div className="banner-title">{this.props.name}</div>
					    {this.renderLink()}
					</div>
				);
			} else {
				return(
					<div className="inner" style={{backgroundImage: "url(/wp-content/themes/CAWeb-Standard/images/banner/banner-gal.png)", backgroundRepeat: 'no-repeat', backgroundPosition: 'right bottom' }}>
						<div className="banner-subtitle">{this.props.job_title}</div>
					    <div className="banner-title">{this.props.name}</div>
					    {this.renderLink()}
					</div>
				);
			}
		}
	}

	
	

	render() {
	    return (
			<Fragment>
			    <div className="profile-banner">
				    {this.renderImage()}
				</div>
	      	</Fragment>
	    );
	}

}

export default ProfileBanner;
