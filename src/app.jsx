import React, { StrictMode } from "react";

import ReactDOM from "react-dom";
import Root from "./root";
window.axios = require("axios");
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

if (document.getElementById("app") != undefined) {
	ReactDOM.render(
		<StrictMode>
			<Root />
		</StrictMode>,
		document.getElementById("app")
	);
}
