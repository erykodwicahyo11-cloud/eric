const fs = require('fs');
const path = require('path');

const glbPath = path.join(__dirname, '..', 'public', 'models', 'character.glb');
const buffer = fs.readFileSync(glbPath);
const chunkLength = buffer.readUInt32LE(12);
const jsonBuffer = buffer.slice(20, 20 + chunkLength);
const gltf = JSON.parse(jsonBuffer.toString('utf8'));

console.log("Root Node 72:", JSON.stringify(gltf.nodes[72], null, 2));

// Print all meshes with scale and translation if they are direct children or descendants
gltf.nodes.forEach((node, i) => {
    if (node.mesh !== undefined) {
        console.log(`Node ${i} has Mesh ${node.mesh}: name="${node.name}", scale=${JSON.stringify(node.scale)}, translation=${JSON.stringify(node.translation)}`);
    }
});
