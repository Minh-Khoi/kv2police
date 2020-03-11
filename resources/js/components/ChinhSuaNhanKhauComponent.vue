<template>
  <div class="nhankhau-component" style="text-align: center">
    <!-- <img src="https://www.w3schools.com/howto/img_paris.jpg" alt /> -->

    <form>
      <table class="table">
        <tbody>
          <tr v-if="!isCreatingMode">
            <td>Nhân Khẩu ID</td>
            <td>
              <input
                type="text"
                disabled
                name="nhankhau_id"
                :value="(chitietnhankhau) ? chitietnhankhau.nhankhau_id : ''"
              />
            </td>
          </tr>

          <tr>
            <td>Họ Tên</td>
            <td>
              <input
                type="text"
                name="hoten"
                :value="(chitietnhankhau) ? chitietnhankhau.hoten : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Họ tên khác</td>
            <td>
              <input
                type="text"
                name="hotenkhac"
                :value="(chitietnhankhau) ? chitietnhankhau.hotenkhac : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Ngày sinh</td>
            <td>
              <input
                type="text"
                name="ngaysinh"
                :value="(chitietnhankhau) ? chitietnhankhau.ngaysinh : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Giới tính</td>
            <td>
              <input
                type="text"
                name="gioitinh"
                :value="(chitietnhankhau) ? chitietnhankhau.gioitinh : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Quê quán</td>
            <td>
              <input
                type="text"
                name="quequan"
                :value="(chitietnhankhau) ? chitietnhankhau.quequan : ''"
              />
            </td>
          </tr>

          <tr>
            <td>Dân tộc</td>
            <td>
              <input
                type="text"
                name="dantoc"
                :value="(chitietnhankhau) ? chitietnhankhau.dantoc : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Tôn giáo</td>
            <td>
              <input
                type="text"
                name="tongiao"
                :value="(chitietnhankhau) ? chitietnhankhau.tongiao : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Số CMND</td>
            <td>
              <input
                type="text"
                name="so_cmnd"
                :value="(chitietnhankhau) ? chitietnhankhau.so_cmnd : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Passport</td>
            <td>
              <input
                type="text"
                name="passport"
                :value="(chitietnhankhau) ? chitietnhankhau.passport : ''"
              />
            </td>
          </tr>
          <tr>
            <td>nghề nghiệp</td>
            <td>
              <input
                type="text"
                name="nghenghiep"
                :value="(chitietnhankhau) ? chitietnhankhau.nghenghiep : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Số HSHK</td>
            <td>
              <input
                type="text"
                name="so_hshk"
                :disabled="(!isCreatingMode)"
                :value="(chitietnhankhau) ? chitietnhankhau.so_hshk : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Hộ ID</td>
            <td>
              <input
                type="text"
                name="ho_id"
                :disabled="(!isCreatingMode)"
                :value="(chitietnhankhau) ? chitietnhankhau.so_hshk : ''"
              />
            </td>
          </tr>
          <tr>
            <td>Diện cư trú</td>
            <td>
              <input
                type="radio"
                id="thuongtru"
                value="thuongtru"
                name="dien_cu_tru"
                :checked="isCreatingMode || dien_cu_tru == 'thuongtru'"
              />
              <label for="thuongtru">THƯỜNG TRÚ</label>
              <input
                type="radio"
                id="tamtru"
                value="tamtru"
                name="dien_cu_tru"
                :checked="dien_cu_tru == 'tamtru' "
              />
              <label for="tamtru">TẠM TRÚ</label>
            </td>
          </tr>
        </tbody>
      </table>
    </form>

    <button v-on:click="excecuteNhanKhauThuongTru()">XONG</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      /** THE Items "nhankhau" of localStorage include all properties of class
       * nhankhauthuongtru and "dien_cu_tru" added
       */
      chitietnhankhau: localStorage.getItem("nhankhau"),
      isCreatingMode: this.$route.params.nhankhau_id == "creating",
      dien_cu_tru: this.chitietnhankhau
        ? this.chitietnhankhau.dien_cu_tru
        : "thuongtru"
    };
  },
  async mounted() {
    console.log("Chi tiet Nhan khau");
    let url = this.isCreatingMode ? "/createnhankhau" : "/editnhankhau";
    let form_instance = document.querySelector("form");

    let form_datas = new FormData(form_instance);

    fetch(url, {
      method: "POST",
      body: form_datas,
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    })
      .then(res => res.text())
      .then(res => {
        console.log(res);
        this.chitietnhankhau = JSON.parse(res);
      });
  },
  methods: {
    excecuteNhanKhauThuongTru() {}
  }
};
</script>
