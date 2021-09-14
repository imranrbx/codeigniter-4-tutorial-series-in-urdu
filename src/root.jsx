import React from "react";
import Home from "./components/home";
import About from "./components/About";
import Contact from "./components/contact";
import Single from "./components/single";
import Create from "./components/create";

import { HashRouter as Router, Switch, Route, Link } from "react-router-dom";

const Root = () => {
	return (
		<Router>
			<nav className="navbar navbar-expand-lg navbar-dark bg-dark">
				<div className="container">
					<Link className="navbar-brand text-uppercase" to="/home">
						<img
							className="mb-0"
							src={base_url + "/images/wplogo.png"}
							alt=""
							width="32"
							height="32"
						/>
					</Link>
					<button
						className="navbar-toggler"
						type="button"
						data-toggle="collapse"
						data-target="#navbarSupportedContent"
						aria-controls="navbarSupportedContent"
						aria-expanded="false"
						aria-label="Toggle navigation"
					>
						<span className="navbar-toggler-icon"></span>
					</button>

					<div
						className="collapse navbar-collapse"
						id="navbarSupportedContent"
					>
						<ul className="navbar-nav ml-auto">
							<li className="nav-item">
								<Link className="nav-link" to="/home">
									Home
									<span className="sr-only">(current)</span>
								</Link>
							</li>
							<li className="nav-item">
								<Link className="nav-link" to="/about">
									About
								</Link>
							</li>
							<li className="nav-item">
								<Link className="nav-link" to="/contact">
									Contact
								</Link>
							</li>
							<li className="nav-item">
								<Link className="nav-link" to="/create">
									Create Post
								</Link>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<Switch>
				<Route exact path="/">
					<Home />
				</Route>
				<Route path="/home">
					<Home />
				</Route>
				<Route path="/about">
					<About />
				</Route>
				<Route path="/contact">
					<Contact />
				</Route>
				<Route path="/create">
					<Create />
				</Route>

				<Route path="/single/:id">
					<Single />
				</Route>
			</Switch>
		</Router>
	);
};
export default Root;
