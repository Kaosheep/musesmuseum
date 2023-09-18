<template>
  <div>
    <canvas id="three"></canvas>
  </div>
</template>

<script>
import * as THREE from "three";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
export default {
  mounted() {
    this.initThree();
  },
  methods: {
    initThree() {
      const scene = new THREE.Scene();

      const canvas = document.querySelector("#three");
      const renderer = new THREE.WebGLRenderer({canvas,antialias: true ,alpha: true });
      renderer.setSize(600, 300);
      renderer.setClearColor(0xffffff, 0);

      const camera = new THREE.PerspectiveCamera(
        50,
        window.innerWidth / window.innerHeight,
        0.1,
        1000
      );

      camera.position.x = 10;
      camera.position.y = 3;
      const gltfLoader = new GLTFLoader();
      gltfLoader.load("/art/scene0.gltf", (gltf) => {
        var model = gltf.scene;
        scene.add(model);
        model.scale.set(0.25, 0.25, 0.25);
        model.translateY(-3);
      });
      const topLight = new THREE.DirectionalLight(0xffffff, .5); 
      topLight.position.set(500, 500, 500); 
      topLight.castShadow = true;
      scene.add(topLight);

      const ambientLight = new THREE.AmbientLight(0xffffff, 2);
      scene.add(ambientLight);


      
      let controls = new OrbitControls(camera, renderer.domElement);
      controls.enableDamping = true;
      controls.enablePan = false;

      function animate() {
        renderer.render(scene, camera);
        controls.update();
        requestAnimationFrame(animate);
      }

      animate();
    },
  },
};
</script>

<style scoped>

</style>
