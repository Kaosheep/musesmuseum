<template>
  <div class="news">
    <main class="news_main">
      <h1>最新消息<br />NEWS</h1>
      <div class="item" v-for="(item, j) in getPageItems" :key="j">
        <div class="txt">
          <span>{{ item.news_date }}</span>
          <h3>{{ item.news_title }}</h3>
          <p>{{ item.news_content }}</p>
        </div>
        <div class="image">
          <img
            :src="(`${this.$store.state.imgpublicpath}image/news/` + item.news_img)"
            alt=""
          />
        </div>
      </div>
    </main>
    <div class="page">
      <Page
        :total="newscol.length"
        :page-size="pageItems"
        v-model="currentPage"
        @click="backtop"
      />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newscol: [],
      currentPage: 1,
      pageItems: 6,
    };
  },
  computed: {
    getPageItems() {
      const startIndex = (this.currentPage - 1) * this.pageItems;
      const endIndex = startIndex + this.pageItems;
      return this.newscol.slice(startIndex, endIndex);
    },
  },
  methods: {
    fetchnews() {
      fetch(`${this.$store.state.publicpath}test.php`).then(async (response) => {
        this.newscol = await response.json();
      });
    },
    backtop() {
      window.scrollTo(0, 0);
    },
  },
  mounted() {
    this.fetchnews();
  },
};
</script>

<style scoped lang="scss">
.news {
  background-image: linear-gradient(45deg, $mlblue 50%, $myellow 50%);
  padding: 20px 0 50px;
  .news_main {
    width: 71%;
    margin: auto;
    @include t() {
      width: 90%;
    }
    h1 {
      margin: 0 0 2rem;
      background-color: #fff;
      @include title($color: $mgreen);
    }
    .item {
      border-radius: 10px;
      background-color: #fff;
      border: 3px solid $mgreen;
      box-shadow: 16px 16px 0px $mgreen;
      display: flex;
      margin-bottom: 3rem;
      padding: 3rem;
      gap: 1rem;
      @include t() {
        padding: 1.5rem;
      }
      @include m() {
        flex-direction: column;
      }
      .txt {
        width: 50%;
        @include m() {
          width: 100%;
        }
        span {
          display: block;
        }
        h3 {
          line-height: 1.5;
          margin: 1.5rem 0;
          background-color: $myellow;
          display: inline-block;
        }
      }
      .image {
        width: 50%;
        @include m() {
          width: 100%;
        }
        img {
          object-fit: cover;
          width: 100%;
          height: 100%;
          border-radius: 10px;
          max-height: 300px;
        }
      }
    }
  }
  .page {
    text-align: center;
  }
}
</style>
