import React from "react";
import Posts from "./components/Posts";
import "./styles/posts.css";

export default function App() {
  return (
    <div className="container py-4">
      <div className="row justify-content-center">
        <div className="col-12 col-lg-8">
          <div className="mb-3">
            <h1 className="h4 mb-1">Section 3 — API Integration</h1>
            <p className="text-muted mb-0">
              Fetch the first 10 post titles from JSONPlaceholder. Shows a spinner for 1 seconds,
              handles errors, and highlights long titles.
            </p>
          </div>

          <Posts />
        </div>
      </div>
    </div>
  );
}
