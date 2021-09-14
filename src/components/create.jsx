import React, { useState } from "react";
import { Link } from "react-router-dom";

const Create = (props) => {
	const [post, createPost] = useState({
		title: "",
		content: "",
		thumbnail: "",
		category_id: "",
	});
	const processForm = (event) => {
		const input = event.target;
		if (input.name == "thumbnail") {
			const reader = new FileReader();
			reader.onload = function() {
				const dataURL = reader.result;
				createPost({ ...post, [input.name]: dataURL });
			};
			reader.readAsDataURL(input.files[0]);
		} else {
			createPost({ ...post, [input.name]: input.value });
		}
	};
	const submitForm = (e) => {
		e.preventDefault();
		axios
			.post(
				base_url + "/api/post",
				{ post },
				{ headers: { "content-type": "multipart/form-data" } }
			)
			.then((res) => console.log(res.data))
			.catch((err) => console.log(err));
	};
	return (
		<div className="col-md-8 offset-md-2">
			<form
				onSubmit={(event) => submitForm(event)}
				method="post"
				encType="multipart/form-data"
			>
				<div className="form-group">
					<label htmlFor="exampleFormControlInput1">Title</label>
					<input
						type="text"
						className="form-control"
						id="exampleFormControlInput1"
						name="title"
						onChange={(event) => processForm(event)}
					/>
				</div>
				<div className="form-group">
					<label
						htmlFor="exampleFormControlSelect1"
						name="category_id"
					>
						Select Category
					</label>
					<select
						className="form-control"
						id="exampleFormControlSelect1"
						name="category_id"
						onChange={(event) => processForm(event)}
					>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div className="form-group">
					<label htmlFor="exampleFormControlTextarea1">Content</label>
					<textarea
						className="form-control"
						id="exampleFormControlTextarea1"
						rows="3"
						name="content"
						onChange={(event) => processForm(event)}
					></textarea>
				</div>
				<div className="form-group">
					<label htmlFor="exampleFormControlTextarea1">
						Thumbnail
					</label>
					<input
						type="file"
						className="custom-control form-control"
						id="exampleFormControlInput1"
						name="thumbnail"
						accept="image/*"
						onChange={(event) => processForm(event)}
					/>
				</div>
				<input
					type="submit"
					className="btn btn-primary"
					value="Add Post"
				/>
			</form>
		</div>
	);
};
export default Create;
