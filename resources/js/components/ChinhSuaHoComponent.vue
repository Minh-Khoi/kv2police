<template>
  <div class="chinhsuaho">
    <h1>THis is Ho component</h1>
    <table class="table">
      <tbody>
        <tr v-if="!isCreatedMode">
          <td>Hộ ID</td>
          <!-- <td>{{chitietho.ho_id}}</td> -->
          <td>
            <input disabled type="text" name="ho_id" :value="(chinhsuaho) ? chinhsuaho.ho_id :''" />
          </td>
        </tr>
        <tr>
          <td>Tổ dân Phố</td>
          <!-- <td>{{chitietho.todanpho_id}}</td> -->
          <input type="text" name="todanpho_id" :value="(chinhsuaho) ? chinhsuaho.todanpho_id : ''" />
        </tr>
        <tr>
          <td>Tên Chủ hộ</td>
          <!-- <td>{{chitietho.ten_chu_ho}}</td> -->
          <input type="text" name="ten_chu_ho" :value="(chinhsuaho) ? chinhsuaho.ten_chu_ho : ''" />
        </tr>
        <tr>
          <td>Số HSHK</td>
          <!-- <td>{{chitietho.so_hshk}}</td> -->
          <input type="text" name="so_hshk" :value="(chinhsuaho) ? chinhsuaho.so_hshk : ''" />
        </tr>
      </tbody>
    </table>

    <button v-on:click="executeHothuongtru()">DONE</button>

    <button v-on:click="renderToChinhSuaNhanKhauComponent()">Chỉnh sửa / Thêm nhân khẩu</button>
  </div>
</template>

<script>
import { vue_router } from "../routes";

export default {
  data() {
    return {
      isCreatedMode: this.$route.params.ho_id == "creating",
      chinhsuaho: localStorage.getItem("ho")
    };
  },
  async mounted() {},
  methods: {
    executeHothuongtru() {
      let form_datas = new FormData();
      //   console.log(
      //     document.querySelector(".chinhsuaho input[name=ho_id]") || "not exist"
      //   );
      if (document.querySelector(".chinhsuaho input[name=ho_id]")) {
        form_datas.append(
          "ho_id",
          document.querySelector(".chinhsuaho input[name='ho_id']").value
        );
      }
      form_datas.append(
        "todanpho_id",
        document.querySelector(".chinhsuaho input[name='todanpho_id']").value
      );
      form_datas.append(
        "ten_chu_ho",
        document.querySelector(".chinhsuaho input[name='ten_chu_ho']").value
      );
      form_datas.append(
        "so_hshk",
        document.querySelector(".chinhsuaho input[name='so_hshk']").value
      );
      let url = this.isCreatedMode ? "/createhothuongtru" : "/edithothuongtru";

      //Fetch API to send request POST statement to server
      // so as to create or edit hothuongtru
      fetch(url, {
        method: "POST",
        body: form_datas,
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
      })
        .then(res => res.text())
        .then(res => console.log(res));
    },
    renderToChinhSuaNhanKhauComponent() {
      // first do the job of creating or editing the hothuongtru details
      this.executeHothuongtru();

      // Render ChinhSuaNhanKhauComponent in creating mode
      vue_router.push({ path: "/vue/chinhsuanhankhau/creating" });
    }
  }
};
</script>

<style>
</style>
