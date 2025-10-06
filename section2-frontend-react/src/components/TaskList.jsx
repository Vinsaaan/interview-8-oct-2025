import React from "react";

export default function TaskList({ tasks, onToggle, onDelete }) {
  if (!tasks.length) {
    return <p className="text-muted mb-0">No tasks yet. Add one!</p>;
  }

  return (
    <ul className="list-group">
      {tasks.map((t) => (
        <li
          key={t.id}
          className="list-group-item d-flex align-items-center justify-content-between"
        >
          {/* Task content (left side) */}
          <div className="me-3 flex-grow-1">
            <div className="fw-semibold mb-1">
              {t.completed ? <s>{t.title}</s> : t.title}
            </div>
            {t.description && (
              <div className="text-muted small">{t.description}</div>
            )}
          </div>

          {/* Toggle + Delete button (right side) */}
          <div className="d-flex align-items-center gap-3">
            {/* Switch stays in fixed position */}
            <div className="form-check form-switch d-flex align-items-center">
              <input
                className="form-check-input me-2"
                type="checkbox"
                role="switch"
                checked={t.completed}
                onChange={() => onToggle(t.id)}
                id={`toggle-${t.id}`}
              />
              <label
                className="form-check-label text-nowrap"
                htmlFor={`toggle-${t.id}`}
                style={{ minWidth: "85px" }}
              >
                {t.completed ? "Completed" : "Active"}
              </label>
            </div>

            {/* Delete button */}
            <button
              type="button"
              className="btn btn-sm btn-outline-danger"
              onClick={() => onDelete(t.id)}
              title="Delete task"
            >
              Delete
            </button>
          </div>
        </li>
      ))}
    </ul>
  );
}
