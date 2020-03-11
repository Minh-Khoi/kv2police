<template>
  <div class="ho-component">
    <h1>THis is Ho {{chitietho.ten_chu_ho}}</h1>
    <button v-on:click="deleteHothuongtru(chitietho)">DELETE</button>
    <table class="table">
      <tbody>
        <tr>
          <td>Hộ ID</td>
          <td>{{chitietho.ho_id}}</td>
        </tr>
        <tr>
          <td>Tổ dân Phố</td>
          <td>{{chitietho.todanpho_id}}</td>
        </tr>
        <tr>
          <td>Tên Chủ hộ</td>
          <td>{{chitietho.ten_chu_ho}}</td>
        </tr>
        <tr>
          <td>Số HSHK</td>
          <td>{{chitietho.so_hshk}}</td>
        </tr>
      </tbody>
    </table>

    <h1>THis is danh sach nhan khau thuong tru</h1>
    <table class="table">
      <thead>
        <tr>
          <th>NhanKhau ID</th>
          <th>Họ Tên</th>
          <th>Họ tên khác</th>
          <th>Ngày sinh</th>
          <th>Giới tính</th>
          <th>Quê quanS</th>
          <th>Dân tộc</th>
          <th>Tôn giáo</th>
          <th>Số CMND</th>
          <th>Passport</th>
          <th>nghề nghiệp</th>
          <th>Số HSHK</th>
          <th>Hộ ID</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="nhankhau in danhsachnhankhau[0]"
          :key="nhankhau.nhankhau_id"
          :id="'nhankhau'+nhankhau.nhankhau_id"
        >
          <td v-for="(value, key) in nhankhau" :key="key">{{value}}</td>
          <td>
            <button>DELETE</button>
          </td>
        </tr>
      </tbody>
    </table>

    <h1>THis is Ho {{chitietho.ten_chu_ho}}</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John</td>
          <td>Doe</td>
          <td>john@example.com</td>
        </tr>
        <tr>
          <td>Mary</td>
          <td>Moe</td>
          <td>mary@example.com</td>
        </tr>
        <tr>
          <td>July</td>
          <td>Dooley</td>
          <td>july@example.com</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { vue_router } from "../routes";
export default {
  data() {
    return {
      chitietho: {},
      danhsachnhankhau: []
    };
  },
  async mounted() {
    console.log("Chi tiet ho:" + this.$route.params.ho_id);
    this.chitietho = JSON.parse(localStorage.getItem("ho"));
    // console.log(this.chitietho);

    // THis Fetch api will render the list of nhankhauthuongtru and nhankhautamtru
    let hothuongtru = JSON.parse(localStorage.getItem("ho"));
    let bodyFormDatas = new FormData();
    bodyFormDatas.append("ho_id", hothuongtru.ho_id);
    //   console.log(hothuongtru.ho_id);
    await fetch("/getnhankhau", {
      method: "POST",
      body: bodyFormDatas,
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    })
      .then(response => response.text())
      .then(response => (this.danhsachnhankhau = JSON.parse(response)));

    // unset localStorage Item : nhankhau
    localStorage.removeItem("nhankhau");
  },
  methods: {
    // renderNhanKhauComponent(nhankhau) {
    //   localStorage.setItem("nhankhau", JSON.stringify(nhankhau));
    //   vue_router.push("/vue/chitietnhankhau/" + nhankhau.nhankhau_id);
    // },

    async deleteHothuongtru(hothuongtru) {
      let form_datas = new FormData();
      form_datas.append("ho_id", hothuongtru.ho_id);

      fetch("/deletehothuongtru", {
        method: "POST",
        body: form_datas,
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
      })
        .then(res => res.text())
        .then(res => console.log(res));
    }
  }
};
</script>
