import { useState, useEffect } from 'react';
import MatrixInput from './MatrixInput';
import ResultDisplay from './ResultDisplay';
import HistoryList from './HistoryList';

export default function App() {
    const [matrix, setMatrix] = useState([]);
    const [visibleCount, setVisibleCount] = useState(null);
    const [history, setHistory] = useState([]);
    const size = 3; // example fixed size, you can make this dynamic later

    async function calculate() {
        if (matrix.length !== size) return;

        const response = await fetch('http://127.0.0.1:8000/api/calculate', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
            body: JSON.stringify({ matrix }),
        });

        const data = await response.json();
        if (response.ok) {
            setVisibleCount(data.visible_count);
            loadHistory();
        } else {
            alert(data.error || 'Calculation failed');
        }
    }

    async function loadHistory() {
        const res = await fetch('http://127.0.0.1:8000/api/history');
        const data = await res.json();
        setHistory(data);
    }

    useEffect(() => {
        loadHistory();
    }, []);

    return (
        <div className="max-w-md mx-auto p-4">
            <h1 className="text-2xl font-bold mb-4">Books Visibility Calculator</h1>
            <MatrixInput size={size} onChange={setMatrix} />
            <button
                onClick={calculate}
                className="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
            >
                Calculate
            </button>
            <ResultDisplay visibleCount={visibleCount} />
            <HistoryList history={history} />
        </div>
    );
}
