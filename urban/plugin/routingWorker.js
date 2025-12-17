self.onmessage = function (e) {
  const { graph, start, end } = e.data;

  const result = dijkstra(graph, start, end);

  self.postMessage(result);
};

function dijkstra(graph, start, end) {
  const distances = {};
  const previous = {};
  const visited = new Set();
  const pq = [];

  for (let node in graph) {
    distances[node] = Infinity;
  }

  distances[start] = 0;
  pq.push({ node: start, dist: 0 });

  while (pq.length > 0) {
    pq.sort((a, b) => a.dist - b.dist);
    const { node } = pq.shift();

    if (visited.has(node)) continue;
    visited.add(node);

    if (node == end) break;

    for (let neighbor of graph[node]) {
      const alt = distances[node] + neighbor.weight;

      if (alt < distances[neighbor.to]) {
        distances[neighbor.to] = alt;
        previous[neighbor.to] = node;
        pq.push({ node: neighbor.to, dist: alt });
      }
    }
  }

  // Reconstruct path
  const path = [];
  let current = end;

  while (current !== undefined) {
    path.unshift(current);
    current = previous[current];
  }

  return {
    path,
    distance: distances[end]
  };
}
