const fs = require('fs');
const path = require('path');

const glbPath = path.join(__dirname, '..', 'public', 'models', 'character.glb');

if (!fs.existsSync(glbPath)) {
    console.error("GLB file not found at:", glbPath);
    process.exit(1);
}

const buffer = fs.readFileSync(glbPath);

// GLB header is 12 bytes
const magic = buffer.readUInt32LE(0);
const version = buffer.readUInt32LE(4);
const length = buffer.readUInt32LE(8);

console.log("GLB Magic:", magic.toString(16));
console.log("GLB Version:", version);
console.log("GLB Total Length:", length);

if (magic !== 0x46546C67) {
    console.error("Invalid GLB magic number");
    process.exit(1);
}

// Chunk 0 header is 8 bytes (chunkLength, chunkType)
const chunkLength = buffer.readUInt32LE(12);
const chunkType = buffer.readUInt32LE(16);

console.log("Chunk 0 Length:", chunkLength);
console.log("Chunk 0 Type:", chunkType.toString(16)); // Should be 4e4f534a (JSON)

if (chunkType !== 0x4E4F534A) {
    console.error("Chunk 0 is not JSON");
    process.exit(1);
}

const jsonBuffer = buffer.slice(20, 20 + chunkLength);
const jsonString = jsonBuffer.toString('utf8');
const gltf = JSON.parse(jsonString);

console.log("\n--- GLTF METADATA ---");
console.log("Generator:", gltf.asset.generator);
console.log("Version:", gltf.asset.version);

console.log("\n--- SCENES ---");
console.log(JSON.stringify(gltf.scenes, null, 2));

console.log("\n--- NODES (First 15) ---");
const nodes = gltf.nodes || [];
console.log(`Total nodes: ${nodes.length}`);
nodes.slice(0, 15).forEach((node, index) => {
    console.log(`Node ${index}: name="${node.name}", mesh=${node.mesh}, children=${node.children ? node.children.length : 0}, scale=${JSON.stringify(node.scale)}, translation=${JSON.stringify(node.translation)}`);
});

console.log("\n--- ANIMATIONS ---");
const animations = gltf.animations || [];
console.log(`Total animations: ${animations.length}`);
animations.forEach((anim, index) => {
    console.log(`Animation ${index}: name="${anim.name || 'Unnamed'}"`);
});

console.log("\n--- MESHES (First 5) ---");
const meshes = gltf.meshes || [];
console.log(`Total meshes: ${meshes.length}`);
meshes.slice(0, 5).forEach((mesh, index) => {
    console.log(`Mesh ${index}: name="${mesh.name}"`);
});
