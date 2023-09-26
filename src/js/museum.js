import * as THREE from "three";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
import { gsap } from "/node_modules/gsap/index.js";
export default {
    data() {
        return {
            locallist: [
                { id: 'store', title: '禮品店' },
                { id: 'localA', title: '展區A' },
                { id: 'localB', title: '展區B' },
                { id: 'localC', title: '展區C' },
                { id: 'rest', title: '餐廳' },
                { id: 'info', title: '服務處' },
            ],
            clickid: 0,
            localinfo: [
                {
                    infoid: "store",
                    imgsrc: "local0.jpg",
                    h: "禮品店",
                    p: `您可以尋找到美麗的明信片、精彩的博物館商品、精緻的手工藝品以及具有特色的紀念品，希望您帶回一些特別的東西，以永久紀念您在博物館的難忘時光。`
                },
                {
                    infoid: "localA",
                    imgsrc: "local1.jpg",
                    h: "展區A",
                    p: `展覽將引領您進入一個充滿藝術與創新的世界。這個展覽將展示當代藝術家的最新作品，透過數位媒體、虛擬現實和互動裝置，讓您深入體驗藝術的未來。這是一個啟發靈感、探索創新和追尋藝術無限可能性的展覽，絕對不能錯過！`
                },
                {
                    infoid: "localB",
                    imgsrc: "local2.jpg",
                    h: "展區B",
                    p: `展覽將帶您穿越時光，欣賞世界各地的歷史藝術珍品。
                    這次展覽匯集了來自不同文化和時代的精彩藝術品，從古埃及的青銅雕像到文藝復興時期的油畫傑作，讓您沉浸在藝術的豐富歷史中。這是一場引人入勝的藝術之旅，探索藝術如何反映了不同時代的價值觀和美學。`
                },
                {
                    infoid: "localC",
                    imgsrc: "local3.jpg",
                    h: "展區C",
                    p: `帶您穿越時光的魔法隧道，探索過去和未來的神奇之處。品味歷史、夢想未來，這趟時光之旅將改變您對時間的看法。別錯過這場獨一無二的奇幻之旅！`
                },
                {
                    infoid: "rest",
                    imgsrc: "local4.jpg",
                    h: "餐廳",
                    p: `提供各式咖啡、茶和點心，讓您盡情品味。室內舒適的座椅，希望您在寧靜的氛圍中放鬆身心，另外提供免費的Wi-Fi，讓您可以隨時與親朋好友分享您在博物館的體驗。`
                },
                {
                    infoid: "info",
                    imgsrc: "local5.jpg",
                    h: "服務處",
                    p: `備有物品
                    (輪椅、嬰兒車、語音導覽)租借
                    遺失物認領
                    導覽地圖
                    急救設備AED`
                },
            ],
            // publicPath: process.env.BASE_URL,
            publicPath: "",
        }
    },
    computed: {
        currentInfo() {
            return this.localinfo.find((info) => info.infoid === this.clickid);
        },
    },
    mounted() {
        this.initThree();
    },
    methods: {
        clean(){
            this.clickid = 0;

        },
        returnid(id) {
            this.clickid = id;
        },
        initThree() {
            const scene = new THREE.Scene();

            const canvas = document.querySelector("#three");
            const renderer = new THREE.WebGLRenderer({
                canvas,
                antialias: true,
                alpha: true,
            });
            renderer.setSize(window.innerWidth, 600);
            renderer.setClearColor(0xffffff, 0);

            const camera = new THREE.PerspectiveCamera(
                50,
                window.innerWidth / 600,
                0.1,
                1000
            );

            camera.position.x = 10;
            camera.position.y = 3.5;
            camera.position.z = 2;

            const gltfLoader = new GLTFLoader();
            gltfLoader.load(`${this.publicPath}/museum/vr_art_gallery/scene.gltf`, (gltf) => {
                var model = gltf.scene;
                scene.add(model);

                model.scale.set(0.25, 0.25, 0.25);
                model.rotateX(-0.2);
                model.rotateY(1);
                model.rotateX(0.5);
                model.position.x = 3;
                model.position.y = 1.5;
                model.position.z = 2;

                document.getElementById("reset").addEventListener("click", () => {
                    gsap.to(model.position, {
                        duration: 1,
                        x: 3,
                        y: 1.5,
                        z: 2,
                    });
                });
                document.getElementById("store").addEventListener("click", () => {
                    gsap.to(model.position, {
                        duration: 1,
                        x: 3,
                        y: 1,
                        z: 2.5,
                    });
                });
                document.getElementById("rest").addEventListener("click", () => {
                    gsap.to(model.position, {
                        duration: 1,
                        x: 3,
                        y: 1.5,
                        z: 3,
                    });
                });
                document.getElementById("info").addEventListener("click", () => {
                    gsap.to(model.position, {
                        duration: 1,
                        x: 3,
                        y: 1.5,
                        z: 3,
                    });
                });
                document.getElementById("localA").addEventListener("click", () => {
                    gsap.to(model.position, {
                        duration: 1,
                        x: 3,
                        y: 1,
                        z: 2,
                    });
                });
                document.getElementById("localB").addEventListener("click", () => {
                    gsap.to(model.position, {
                        duration: 1,
                        x: 4,
                        y: 1,
                        z: 1,
                    });
                });
                document.getElementById("localC").addEventListener("click", () => {
                    gsap.to(model.position, {
                        duration: 1,
                        x: 3.5,
                        y: 2,
                        z: 1.5,
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
            controls.enabled = false;

            let localbtns = [...document.querySelectorAll(".localbtn")];
            document.getElementById("reset").addEventListener("click", () => {
                document.getElementById("reset").style.display = "none";
                gsap.to(camera.position, {
                    duration: 0.8,
                    x: 10,
                    y: 3.5,
                    z: 2,
                });
                localbtns.forEach((btn) => {
                    btn.style.transition = ".3s .5s";
                    btn.style.opacity = "1";
                    btn.style.pointerEvents = "auto";
                });
            });
            document.getElementById("store").addEventListener("click", () => {
                document.getElementById("reset").style.display = "inline-block";
                localbtns.forEach((btn) => {
                    btn.style.opacity = "0";
                    btn.style.pointerEvents = "none";
                    btn.style.transition = "0s";
                });
                gsap.to(camera.position, {
                    duration: 1,
                    x: 5,
                    y: 2,
                    z: -2,
                });
            });
            document.getElementById("rest").addEventListener("click", () => {
                document.getElementById("reset").style.display = "inline-block";
                localbtns.forEach((btn) => {
                    btn.style.opacity = "0";
                    btn.style.pointerEvents = "none";
                    btn.style.transition = "0s";
                });
                gsap.to(camera.position, {
                    duration: 1,
                    x: 5.8,
                    y: 2,
                    z: 0,
                });
            });
            document.getElementById("info").addEventListener("click", () => {
                document.getElementById("reset").style.display = "inline-block";
                localbtns.forEach((btn) => {
                    btn.style.opacity = "0";
                    btn.style.pointerEvents = "none";
                    btn.style.transition = "0s";
                });
                gsap.to(camera.position, {
                    duration: 1,
                    x: 7,
                    y: 1.5,
                    z: 0.5,
                });
            });
            document.getElementById("localA").addEventListener("click", () => {
                document.getElementById("reset").style.display = "inline-block";
                localbtns.forEach((btn) => {
                    btn.style.opacity = "0";
                    btn.style.pointerEvents = "none";
                    btn.style.transition = "0s";
                });
                gsap.to(camera.position, {
                    duration: 1,
                    x: 3.5,
                    y: 2.5,
                    z: 0,
                });
            });
            document.getElementById("localB").addEventListener("click", () => {
                document.getElementById("reset").style.display = "inline-block";
                localbtns.forEach((btn) => {
                    btn.style.opacity = "0";
                    btn.style.pointerEvents = "none";
                    btn.style.transition = "0s";
                });
                gsap.to(camera.position, {
                    duration: 1,
                    x: 5,
                    y: 2,
                    z: 1,
                });
            });
            document.getElementById("localC").addEventListener("click", () => {
                document.getElementById("reset").style.display = "inline-block";
                localbtns.forEach((btn) => {
                    btn.style.opacity = "0";
                    btn.style.pointerEvents = "none";
                    btn.style.transition = "0s";
                });
                gsap.to(camera.position, {
                    duration: 1,
                    x: 7,
                    y: 2.5,
                    z: 2.5,
                });
            });

            function animate() {
                renderer.render(scene, camera);
                camera.aspect = window.innerWidth / 600;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, 600);
                controls.update();
                requestAnimationFrame(animate);
            }

            animate();
        },
    },
};