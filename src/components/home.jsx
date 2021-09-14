import React, { useState, useEffect } from "react";
import Post from "./post";
import Paginate from "./paginate";

const Home = () => {
	const [data, setData] = useState([]);
	const [offset, setOffset] = useState(0);
	const [pages, setPages] = useState(0);
	const limit = 5;
	useEffect(() => {
		axios
			.get("http://ci4app.test/api/post", { params: { limit, offset } })
			.then((res) => {
				setData(res.data.posts);
				setPages(Math.ceil(res.data.total_count / limit));
			})
			.catch((err) => console.log(err));
	}, [true, offset]);
	const posts = data.map((row, index) => <Post key={index} post={row} />);
	return (
		<div className="container">
			<div className="row">
				{posts}
				<div className="col-md-8 offset-md-2">
					<Paginate
						pages={pages}
						currentPage={(p) => setOffset((p - 1) * limit)}
					/>
				</div>
			</div>
		</div>
	);
};
export default Home;
