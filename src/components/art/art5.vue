<template>
  <div>
    <canvas id="three5"></canvas>
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

      const canvas = document.querySelector("#three5");
      const renderer = new THREE.WebGLRenderer({canvas,antialias: true,alpha: true });
      renderer.setSize(600, 350);
      renderer.setClearColor(0xffffff, 0);
   
      const camera = new THREE.PerspectiveCamera(
        50,
        600 / 350,
        0.1,
        1000
      );
      camera.position.y = 2;
      camera.position.x = 2;
      camera.position.z = 1;

      const gltfLoader = new GLTFLoader();
      gltfLoader.load(`${this.publicPath}/art/scene5.gltf`, (gltf) => {
        var model = gltf.scene;
        scene.add(model);
        model.scale.set(1, 1, 1);
        
        model.rotateX(-0.9);
        model.rotateY(1);
        model.rotateZ(-1);
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
      controls.target.set( 0, 0, 0);
      
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
