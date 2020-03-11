<template>
  <div class="nhankhau" id="myTable">
    <!-- This is table and details of list of nhankhauthuongtru -->
    <h2>THis is danh sach nhan khau thuong tru</h2>
    <input
      type="checkbox"
      name="showhidethuongtru"
      id="showthuongtru"
      checked
      v-on:change="showhidethuongtru($event)"
    />
    <label for="showthuongtru">SHOW</label>

    <table class="table tablethuongtru" v-if="showthuongtru">
      <thead>
        <tr>
          <th>NK ID</th>
          <th>Họ và Tên</th>
          <th>tên khác</th>
          <th>Ngày sinh</th>
          <th>Giới tính</th>
          <th>Quê quanS</th>
          <th>Dân tộc</th>
          <th>Tôn giáo</th>
          <th>Số CMND</th>
          <th>Hộ chiếu</th>
          <th>nghề nghiệp</th>
          <th>Quan hệ với chủ hộ</th>
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

    <!-- This is table and details for list of nhankhautamtru -->
    <h2>THis is danh sach nhan khau tam tru</h2>
    <input
      type="checkbox"
      name="showhidetamtru"
      id="showtamtru"
      checked
      v-on:change="showhidetamtru($event)"
    />
    <label for="showtamtru">SHOW</label>

    <table class="table tabletamtru" v-if="showtamtru">
      <thead>
        <tr>
          <th>NK ID</th>
          <th>Họ và Tên</th>
          <th>tên khác</th>
          <th>Ngày sinh</th>
          <th>Giới tính</th>
          <th>Quê quanS</th>
          <th>Dân tộc</th>
          <th>Tôn giáo</th>
          <th>Số CMND</th>
          <th>Hộ chiếu</th>
          <th>nghề nghiệp</th>
          <th>Quan hệ với chủ hộ</th>
          <th>Số HSHK</th>
          <th>Hộ ID</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="nhankhau in danhsachnhankhau[1]"
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
  </div>
</template>

<script>
export default {
  data() {
    return {
      danhsachnhankhau: [],
      showthuongtru: true,
      showtamtru: true
    };
  },
  async mounted() {
    // console.log("http://localhost:1111/getdanhsachnhankhau");
    // Fetch API render the list of nhankhauthuongtru and nhankhautamtru
    await fetch("/getdanhsachnhankhau", {
      method: "POST",
      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") }
    })
      .then(resolve => resolve.text())
      .then(resolve => {
        this.danhsachnhankhau = JSON.parse(resolve);
        // console.log(resolve);
      });
  },
  methods: {
    showhidethuongtru(event) {
      this.showthuongtru = event.target.checked;
    },
    showhidetamtru(event) {
      this.showtamtru = event.target.checked;
    }
  }
};
</script>

<style>
input[type="checkbox"]:checked::after,
input[type="checkbox"]::after {
  margin: 0;
  background: none;
  content: none;
}
input[type="checkbox"] {
  transform: scale(2);
  margin-right: 5px;
}
label {
  font-size: 1.5em;
}
</style>
