<template>
  <div>
    <canvas id="three2"></canvas>
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

      const canvas = document.querySelector("#three2");
      const renderer = new THREE.WebGLRenderer({canvas,antialias: true ,alpha: true });
      renderer.setSize(600, 400);
      renderer.setClearColor(0xffffff, 0);

      const camera = new THREE.PerspectiveCamera(
        50,
        600 / 400,
        0.1,
        1000
      );

      camera.position.x = 6;


      const gltfLoader = new GLTFLoader();
      gltfLoader.load(`${this.publicPath}/art/scene2.gltf`, (gltf) => {
        var model = gltf.scene;
        scene.add(model);
        model.scale.set(1, 1, 1);
        model.translateY(-1.5)
      });
      const topLight = new THREE.DirectionalLight(0xffffff, .7); 
      topLight.position.set(500, 500, 500); 
      topLight.castShadow = true;
      scene.add(topLight);

      const ambientLight = new THREE.AmbientLight(0xffffff, 1.8);
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

