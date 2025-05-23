export default function ResultDisplay({ visibleCount }) {
    if (visibleCount === null) return null;
    return <div className="mt-4 text-lg font-semibold">Visible stacks: {visibleCount}</div>;
}
