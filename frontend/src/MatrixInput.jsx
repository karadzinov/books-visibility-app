import { useState } from 'react';

export default function MatrixInput({ size, onChange }) {
    // Initialize matrix state with zeros or empty
    const [matrix, setMatrix] = useState(
        Array(size).fill(0).map(() => Array(size).fill(0))
    );

    function handleChange(row, col, value) {
        const newMatrix = matrix.map(r => [...r]);
        newMatrix[row][col] = Number(value);
        setMatrix(newMatrix);
        onChange(newMatrix);
    }

    return (
        <div>
            {matrix.map((row, i) => (
                <div key={i} style={{ display: 'flex', gap: '0.5rem' }}>
                    {row.map((val, j) => (
                        <input
                            key={j}
                            type="number"
                            min="0"
                            max="1000"
                            value={val}
                            onChange={e => handleChange(i, j, e.target.value)}
                            className="w-12 border p-1"
                        />
                    ))}
                </div>
            ))}
        </div>
    );
}
