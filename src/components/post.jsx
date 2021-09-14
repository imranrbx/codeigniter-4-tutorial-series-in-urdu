import React from "react";
import { Link } from "react-router-dom";

const Post = ({ post }) => {
	return (
		<div className="col-md-8 offset-md-2">
			<div className="blog-post">
				<Link to={`/single/${post.id}`}>
					<h2 className="blog-post-title">{post.title}</h2>
				</Link>
				<hr />
			</div>
		</div>
	);
};
export default Post;
