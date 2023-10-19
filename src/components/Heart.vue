<template>
  <div :class="['heart', { active: activelove }]" @click="uplove()">
    <svg
      viewBox="-10 -8 162 143"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        fill-rule="evenodd"
        clip-rule="evenodd"
        d="M136.206 73.9802C143.523 66.1228 148 55.5842 148 44C148 19.6995 128.301 0 104 0C92.4061 0 81.8596 4.48413 74.0001 11.8127C66.1406 4.48413 55.5939 0 44 0C19.6995 0 0 19.6995 0 44C0 56.2075 4.97119 67.2544 13 75.2256L59.9487 122.174C67.7592 129.985 80.4225 129.985 88.233 122.174L136.316 74.0911L136.206 73.9802Z"
      />
    </svg>
  </div>
</template>
<script>
export default {
  props: ["loveid"],
  data() {
    return {
      lovescol: [],
    };
  },
  computed: {
    activelove() {
      if (!this.$store.state.mbr_id) {
        return 0;
      } else if (this.loveid) {
        return this.lovescol.some((item) => item.prod_id === this.loveid);
      } else {
        return 0;
      }
    },
  },
  methods: {
    success(nodesc, json) {
      this.$Notice.success({
        title: json,
        desc: nodesc
          ? ""
          : "Here is the notification description. Here is the notification description. ",
      });
    },
    getlove() {
      const formData = new URLSearchParams();
      formData.append("mbr_id", this.$store.state.mbr_id);

      fetch(`${this.$store.state.publicpath}love_fetch.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
        },
        body: formData,
      })
        .then((response) => {
          if (response.ok) {
            return response.json(); // 如果請求成功，解析JSON數據
          } else {
            throw new Error("取得消息失敗"); // 如果請求不成功，拋出錯誤
          }
        })
        .then((json) => {
          this.lovescol = json;
        })
        .catch((error) => {
          console.log(error.message);
        });
    },
    uplove() {
      
      if (!this.$store.state.mbr_id) {
        document.location.href = `${this.$store.state.imgpublicpath}Home/Login`;
      } else {
        const formData = new URLSearchParams();
        formData.append("prod_id", this.loveid);
        formData.append("mbr_id", this.$store.state.mbr_id);

        fetch(`${this.$store.state.publicpath}love_insertupload.php`, {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=utf-8",
          },
          body: formData,
        })
          .then((response) => {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error("取得消息失敗");
            }
          })
          .then((json) => {
            this.success(true, json);
            this.lovescol=[];
            this.getlove();
          });
      }
    },
  },
  mounted() {
    this.getlove();
  },
};
</script>
<style scoped lang="scss">
.heart {
  cursor: pointer;
  // position: absolute;
  right: 5px;
  top: 5px;
  width: 30px;
  z-index: 3;
}
.heart path {
  fill: #fff;
  stroke-width: 10;
  stroke: $mpink;
  stroke-dasharray: 440;
  stroke-dashoffset: 0;
}

.heart.active path {
  fill: $mpink;
  animation: none;
}
@keyframes heart {
  0% {
    stroke-dashoffset: 0;
  }
  40% {
    stroke-dashoffset: 440;
  }
  80% {
    stroke-dashoffset: 880;
    fill: #fff;
  }
  100% {
    stroke-dashoffset: 880;
    fill: $mpink;
  }
}
@media screen and (hover: hover) {
  .heart:not(.active):hover path {
    animation: heart 0.7s 0.05s linear forwards;
  }
}
</style>
