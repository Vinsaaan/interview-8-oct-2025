import React, { useState } from "react";

export default function TaskForm({ onAdd }) {
  const [title, setTitle] = useState("");
  const [description, setDescription] = useState("");

  const submit = (e) => {
    e.preventDefault();
    if (!title.trim()) return;
    onAdd({ title, description });
    setTitle("");
    setDescription("");
  };

  return (
    <form onSubmit={submit} className="vstack gap-3">
      <div>
        <label className="form-label">Title <span className="text-danger">*</span></label>
        <input
          className="form-control"
          placeholder="e.g. Prepare slides"
          value={title}
          onChange={(e) => setTitle(e.target.value)}
          required
        />
      </div>

      <div>
        <label className="form-label">Description</label>
        <textarea
          className="form-control"
          rows={3}
          placeholder="Optional notes"
          value={description}
          onChange={(e) => setDescription(e.target.value)}
        />
      </div>

      <div className="d-flex justify-content-end">
        <button type="submit" className="btn btn-primary">
          Add Task
        </button>
      </div>
    </form>
  );
}
