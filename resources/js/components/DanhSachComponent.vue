<template>
  <div class="danhsach-component">
    <h1>THis is Danh sacsh component</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tổ dân phố</th>
          <th>Tên Chủ hộ</th>
          <th>Số HSHK</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="(input) in inputs"
          :key="input.key"
          :id="'ho'+input.ho_id"
          v-on:click="renderToHoComponent(input)"
        >
          <td v-for="(inputValue, key) in input" :key="key">{{inputValue}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
import { vue_router } from "../routes";

export default {
  data() {
    return {
      inputs: {},
      list_of_todanpho: []
    };
  },

  //   THe function mounted will be call when vue component inited
  async mounted() {
    console.log("Component mounted.");
    let form_datas = new FormData();

    // This fetch API will render the list of todanpho
    await fetch("/gettodanpho", {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    })
      .then(res_of_todanpho => res_of_todanpho.text())
      .then(res_of_todanpho => {
        this.list_of_todanpho = JSON.parse(res_of_todanpho);
        // console.log(this.list_of_todanpho);
      });

    // this Fetch API will render danh sach hothuongtru after that replace the todanpho_id by todanpho name
    fetch("/getdanhsachho", {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    })
      .then(response => response.text())
      .then(response => {
        this.inputs = JSON.parse(response);
        for (let index in this.inputs) {
          for (let i in this.list_of_todanpho) {
            if (
              this.inputs[index].todanpho_id ==
              this.list_of_todanpho[i]["todanpho_id"]
            ) {
              this.inputs[index].todanpho_id = this.list_of_todanpho[i]["ten"];
            }
          }
        }
      });

    //  unset the localStorage item : "ho"
    localStorage.removeItem("ho");
  },

  methods: {
    /** THis functions call API for the list nhankhauthuongtru and nhankhautamtru filter by ho_id */
    async renderToHoComponent(hothuongtru) {
      localStorage.setItem("ho", JSON.stringify(hothuongtru));
      // Then use Router push() to render the Vue HoComponent
      vue_router.push({ path: "/vue/chitietho/" + hothuongtru.ho_id });
    }
  }
};
</script>
<style scoped>
table tbody tr:hover {
  background-color: rgba(91, 172, 192, 0.685);
  color: rgb(161, 59, 59);
}
</style>
