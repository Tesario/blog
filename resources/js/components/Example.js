import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import Posts from "./Posts";

function Example() {
    const [posts, setPosts] = useState([]);

    useEffect(() => {
        fetch("http://127.0.0.1:8000/api/post")
            .then((response) => response.json())
            .then((data) => setPosts(data));
        console.log(posts);
    }, []);
    return (
        <Router>
            <div className="container">
                <div className="card-body">A React components</div>
                <Route exact path="/">
                    <Posts posts={posts} />
                </Route>
            </div>
        </Router>
    );
}

export default Example;

if (document.getElementById("root")) {
    ReactDOM.render(<Example />, document.getElementById("root"));
}
