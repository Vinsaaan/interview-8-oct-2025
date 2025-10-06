import React, { useEffect, useState } from "react";

const API = "https://jsonplaceholder.typicode.com/posts?_limit=10";

export default function Posts() {
  const [posts, setPosts] = useState([]);
  const [loading, setLoading] = useState(true);
  const [err, setErr] = useState("");

  useEffect(() => {
    const controller = new AbortController();
    setLoading(true);
    setErr("");

    fetch(API, { signal: controller.signal })
      .then((res) => {
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        return res.json();
      })
      .then((data) => {
        // show spinner for 1 seconds minimum
        setTimeout(() => {
          setPosts(Array.isArray(data) ? data : []);
          setLoading(false);
        }, 1000);
      })
      .catch((e) => {
        if (e.name !== "AbortError") {
          setTimeout(() => {
            setErr(e.message || "Failed to fetch posts");
            setLoading(false);
          }, 1000);
        }
      });

    return () => controller.abort();
  }, []);

  return (
    <div className="card shadow-sm">
      <div className="card-body">
        {/* Spinner while fetching */}
        {loading && (
          <div className="d-flex align-items-center gap-2 justify-content-center my-3">
            <div
              className="spinner-border text-primary"
              role="status"
              aria-label="Loading"
            />
            <span className="text-secondary">Loading posts…</span>
          </div>
        )}

        {/* Error message */}
        {!!err && !loading && (
          <div className="alert alert-danger mt-2" role="alert">
            Failed to fetch: {err}
          </div>
        )}

        {/* Display posts */}
        {!loading && !err && (
          <ol className="list-group list-group-numbered mt-3">
            {posts.map((p) => {
              const isLong = (p.title || "").length > 30;
              return (
                <li
                  key={p.id}
                  className={`list-group-item ${
                    isLong ? "highlight-long" : ""
                  }`}
                  title={isLong ? "Title length > 30 characters" : undefined}
                >
                  {p.title}
                </li>
              );
            })}
          </ol>
        )}
      </div>
    </div>
  );
}
