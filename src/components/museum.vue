<template>
  <div class="museum">
    <button id="reset">
      <p>Back</p>
      <span></span>
    </button>
    <canvas id="three"></canvas>
    <button id="store">禮品店</button>
  </div>
</template>

<script>
import * as THREE from "three";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
import { gsap } from "/node_modules/gsap/index.js";
export default {
  mounted() {
    this.initThree();
  },
  methods: {
    initThree() {
      const scene = new THREE.Scene();

      const canvas = document.querySelector("#three");
      const renderer = new THREE.WebGLRenderer({
        canvas,
        antialias: true,
        alpha: true,
      });
      renderer.setSize(window.innerWidth, window.innerHeight);
      renderer.setClearColor(0xffffff, 0);

      const camera = new THREE.PerspectiveCamera(
        50,
        window.innerWidth / window.innerHeight,
        0.1,
        1000
      );

      camera.position.x = 10;
      camera.position.y = 3;
      camera.position.z = 1;
      //   camera.position.x = 3;
      //   camera.position.y = 4;
      //   camera.position.z = 5;
      const gltfLoader = new GLTFLoader();
      gltfLoader.load("/museum/vr_art_gallery/scene.gltf", (gltf) => {
        var model = gltf.scene;
        scene.add(model);
        model.scale.set(0.25, 0.25, 0.25);
        model.rotateX(-0.2);
        model.rotateY(1);
        model.rotateX(0.5);
        model.position.x=1;
        model.position.y=1;
        model.position.z=3;

        document.getElementById("store").addEventListener("click", () => {
          gsap.to(model.position, {
            duration: 1,
            x:5
            
          });
        });
      });
      const topLight = new THREE.DirectionalLight(0xffffff, 1);
      topLight.position.set(500, 500, 500);
      topLight.castShadow = true;
      scene.add(topLight);

      const ambientLight = new THREE.AmbientLight(0xffffff, 2);
      scene.add(ambientLight);

      let controls = new OrbitControls(camera, renderer.domElement);
      //   controls.enableDamping=true;
        controls.enabled = false;

      //   document.getElementById("reset").addEventListener("click", () => {
      //     document.getElementById("reset").style.display = "none";
      //     gsap.to(camera.position, {
      //       duration: 1,
      //       x: 10,
      //       y: 3,
      //       z: 1,
      //     });
      //     document.getElementById("store").style.display = "inline-block";
      //   });
      //   document.getElementById("store").addEventListener("click", () => {
      //     document.getElementById("reset").style.display = "inline-block";
      //     document.getElementById("store").style.display = "none";
      //     gsap.to(camera.position, {
      //       duration: 1,
      //       x: 3.5,
      //       y: 2,
      //       z: -1.5,
      //     });
      //   });

      function animate() {
        renderer.render(scene, camera);
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
        controls.update();
        requestAnimationFrame(animate);
      }

      animate();
    },
  },
};
</script>

<style scoped lang="scss">
.museum {
  background: rgb(251, 247, 150);
  background: linear-gradient(
    0deg,
    rgba(251, 247, 150, 1) 0%,
    rgba(195, 227, 232, 1) 60%
  );
  position: relative;
  button {
    position: absolute;
    z-index: 100;
  }
  #reset {
    display: none;
    top: 5%;
    left: 5%;
    width: 100px;
    padding: 10px 10px 0px;
    background-color: #fff;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    p {
      text-align: end;
      width: 70px;
      font-weight: 700;
    }
    span {
      display: inline-block;
      width: 70px;
      height: 3px;
      border-radius: 2px;
      vertical-align: top;
      background-color: $mpink;
      position: relative;
      &::after {
        content: "";
        width: 15px;
        height: 3px;
        border-radius: 2px;
        background-color: $mpink;
        position: absolute;
        left: -15px;
        bottom: 2px;
        transform-origin: right bottom;
        transform: rotate(135deg);
      }
    }
  }
  #store {
    top: 40%;
    left: 60%;
  }
}
</style>
