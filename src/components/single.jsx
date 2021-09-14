import React, { useState, useEffect } from "react";
import { useParams } from "react-router-dom";
const Single = () => {
	const [post, setPost] = useState([]);
	const { id } = useParams();
	useEffect(() => {
		axios
			.get(`http://ci4app.test/api/post/${id}`)
			.then((res) => setPost(res.data))
			.catch((err) => console.log(err));
	}, [true]);

	return (
		<div className="container">
			<div className="row">
				<div className="col-md-8 offset-md-2">
					<div className="blog-post">
						<h2 className="blog-post-title">{post.title}</h2>
						<p>{post.content}</p>
						<hr />
					</div>
				</div>
			</div>
		</div>
	);
};
export default Single;
