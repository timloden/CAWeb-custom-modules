// External Dependencies
import React, { Component, Fragment } from 'react';

// Internal Dependencies
import './style.css';


class Testimonial extends Component {

	static slug = 'cacm_testimonial';

	renderTopImage() {
		if (this.props.image_layout === 'thumbnail-top') {
			return (
				<div className={"thumbnail " + (this.props.image_layout)}>
					<a href={this.props.image_link}><img className={"thumbnail-img img-" + (this.props.image_style)} src={this.props.featured_image} alt="" /></a>
				</div>
			);
		}
	}

	renderLeftImage() {
		if (this.props.image_layout === 'thumbnail-left' || this.props.image_layout === 'thumbnail-bottom thumbnail-left') {
			return (
				<div className={"thumbnail " + (this.props.image_layout)}>
					<a href={this.props.image_link}><img className={"thumbnail-img img-" + (this.props.image_style)} src={this.props.featured_image} alt="" /></a>
				</div>
			);
		}
	}

	renderRightImage() {
		if (this.props.image_layout === 'thumbnail-right' || this.props.image_layout === 'thumbnail-bottom thumbnail-right') {
			return (
				<div className={"thumbnail " + (this.props.image_layout)}>
					<a href={this.props.image_link}><img className={"thumbnail-img img-" + (this.props.image_style)} src={this.props.featured_image} alt="" /></a>
				</div>
			);
		}
	}

	render() {
	    return (
			<Fragment>
				<blockquote className={"testimonial testimonial-" + (this.props.layout)}>
	                {this.renderLeftImage()}
	                {this.renderTopImage()}
	                <div class="testimonial-body">
	                    {this.props.content()}
	                    <footer>
	                        <cite>
	                            <a href={this.props.name_link}>{this.props.name}</a> {this.props.title}
	                        </cite>
	                    </footer>
	                </div>
	                {this.renderRightImage()}
	            </blockquote>
	      	</Fragment>
	    );
	}

}

export default Testimonial;
