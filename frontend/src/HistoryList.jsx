export default function HistoryList({ history }) {
    return (
        <div className="mt-6">
            <h2 className="font-bold mb-2">Calculation History</h2>
            <ul className="list-disc list-inside">
                {history.map(item => (
                    <li key={item.id}>
                        {new Date(item.created_at).toLocaleString()}: {item.visible_count}
                    </li>
                ))}
            </ul>
        </div>
    );
}
