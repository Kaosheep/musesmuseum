<template>
  <div>
    <canvas id="three1"></canvas>
  </div>
</template>

<script>
import * as THREE from "three";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
export default {
  data(){
    return{
      publicPath: process.env.BASE_URL,
    }
    
  },
  mounted() {
    this.initThree();
  },
  methods: {
    initThree() {
      const scene = new THREE.Scene();

      const canvas = document.querySelector("#three1");
      const renderer = new THREE.WebGLRenderer({canvas,antialias: true ,alpha: true });
      renderer.setSize(600, 300);
      renderer.setClearColor(0xffffff, 0);

      const camera = new THREE.PerspectiveCamera(
        50,
        600 / 300,
        0.1,
        1000
      );

      camera.position.x = 50;


      const gltfLoader = new GLTFLoader();
      gltfLoader.load(`${this.publicPath}/art/scene1.gltf`, (gltf) => {
        var model = gltf.scene;
        scene.add(model);
        model.scale.set(0.15, 0.15, 0.15);
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
