import React, { useEffect, useState } from "react";
import TaskForm from "./components/TaskForm";
import TaskList from "./components/TaskList";

const STORAGE_KEY = "section2_tasks_v1";
const DATA_URL = "/tasks.json"; // default static file

export default function App() {
  const [tasks, setTasks] = useState([]);
  const [loading, setLoading] = useState(true);
  const [loadError, setLoadError] = useState("");
  const [hydrated, setHydrated] = useState(false); // avoid saving before data loads

  // helper: load default tasks from tasks.json
  const fetchDefaults = async () => {
    const res = await fetch(DATA_URL, { cache: "no-cache" });
    if (!res.ok) throw new Error("Failed to load tasks.json");
    const data = await res.json();
    return Array.isArray(data) ? data : [];
  };

  // safe read from localStorage
  const readLocal = () => {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      if (!raw) return null;
      const parsed = JSON.parse(raw);
      return Array.isArray(parsed) ? parsed : null;
    } catch {
      return null;
    }
  };

  // 1) initial load: try localStorage → fallback to tasks.json
  useEffect(() => {
    (async () => {
      try {
        const cached = readLocal();
        if (cached) {
          setTasks(cached);
        } else {
          const defaults = await fetchDefaults();
          setTasks(defaults);
        }
        setLoadError("");
      } catch (e) {
        console.error(e);
        setLoadError(e.message || "Failed to load tasks");
      } finally {
        setLoading(false);
        setHydrated(true); // only after everything is loaded
      }
    })();
  }, []);

  // 2) whenever tasks change → save to localStorage (only after hydrated)
  useEffect(() => {
    if (!hydrated) return;
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(tasks));
    } catch (e) {
      console.warn("localStorage write failed:", e);
    }
  }, [tasks, hydrated]);

  // 3) add new task (id = largest + 1 from localStorage)
  const addTask = ({ title, description }) => {
    const t = (title || "").trim();
    const d = (description || "").trim();
    if (!t) return;

    let stored = [];
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      if (raw) stored = JSON.parse(raw);
    } catch {}

    // find the largest current id (from stored + in-memory)
    const allTasks = [...stored, ...tasks];
    const maxId = allTasks.length > 0 ? Math.max(...allTasks.map((t) => t.id || 0)) : 0;

    const newTask = {
      id: maxId + 1,
      title: t,
      description: d,
      completed: false,
    };

    setTasks((prev) => [newTask, ...prev]);
  };

  // 4) toggle complete
  const toggleCompleted = (id) => {
    setTasks((prev) =>
      prev.map((t) => (t.id === id ? { ...t, completed: !t.completed } : t))
    );
  };

  // 5) delete a task
  const deleteTask = (id) => {
    setTasks((prev) => prev.filter((t) => t.id !== id));
  };

  // 6) reset (clear local + reload defaults)
  const resetToDefaults = async () => {
    try {
      localStorage.removeItem(STORAGE_KEY);
      setLoading(true);
      const defaults = await fetchDefaults();
      setTasks(defaults);
      setLoadError("");
    } catch (e) {
      setLoadError(e.message || "Failed to load defaults");
    } finally {
      setLoading(false);
    }
  };

  // 7) render UI
  return (
    <div className="container py-4">
      <header className="mb-4">
        <h1 className="h3 mb-1">Task Manager (React + Bootstrap)</h1>
        <p className="text-muted mb-0">
          • Defaults come from <code>tasks.json</code>. Adds/Deletes persist to{" "}
          <code>localStorage</code>. <br />
          • “Load defaults” clears local changes and reloads from JSON.
        </p>
      </header>

      <div className="row g-4">
        <div className="col-12 col-lg-5">
          <div className="card shadow-sm">
            <div className="card-body">
              <h2 className="h5">Add New Task</h2>
              <TaskForm onAdd={addTask} />
            </div>
          </div>
        </div>

        <div className="col-12 col-lg-7">
          <div className="card shadow-sm">
            <div className="card-body">
              <div className="d-flex align-items-center justify-content-between mb-3">
                <h2 className="h5 mb-0">Tasks</h2>
                <span className="badge text-bg-secondary">{tasks.length}</span>
              </div>

              {loading && (
                <div className="d-flex align-items-center gap-2">
                  <div className="spinner-border spinner-border-sm" role="status" />
                  <span>Loading…</span>
                </div>
              )}

              {!!loadError && (
                <div className="alert alert-danger" role="alert">
                  {loadError}
                </div>
              )}

              {!loading && !loadError && (
                <>
                  <TaskList
                    tasks={tasks}
                    onToggle={toggleCompleted}
                    onDelete={deleteTask}
                  />

                  <div className="mt-3 d-flex justify-content-end">
                    <button
                      type="button"
                      className="btn btn-outline-secondary"
                      onClick={resetToDefaults}
                      title="Clear local changes and reload default tasks.json"
                    >
                      Load defaults (clear local)
                    </button>
                  </div>
                </>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
