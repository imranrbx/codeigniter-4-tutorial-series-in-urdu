import React from "react";
import { Link } from "react-router-dom";

const Paginate = ({ pages, currentPage }) => {
	let totalPages = [];
	for (let i = 1; i <= pages; i++) {
		totalPages.push(
			<li className="page-item" key={i}>
				<button className="page-link" onClick={() => currentPage(i)}>
					{i}
				</button>
			</li>
		);
	}
	return (
		<nav aria-label="Page navigation example">
			<ul className="pagination">
				<li className="page-item">
					<button
						className="page-link"
						onClick={() => currentPage(1)}
					>
						First
					</button>
				</li>
				{totalPages}
				<li className="page-item">
					<button
						className="page-link"
						onClick={() => currentPage(pages)}
					>
						Last
					</button>
				</li>
			</ul>
		</nav>
	);
};
export default Paginate;
