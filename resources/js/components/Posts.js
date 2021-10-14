import React from "react";

function Posts(props) {
    const { posts } = props;

    console.log(posts);
    return (
        <div>
            <div>
                {posts.map((elem, i) => (
                    <ul key={i}>
                        <li className="travelcompany-input">{elem.title}</li>
                        <li className="travelcompany-input">{elem.text}</li>
                    </ul>
                ))}
            </div>
        </div>
    );
}

export default Posts;
