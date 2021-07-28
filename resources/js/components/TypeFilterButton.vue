<template>
  <div>
    <div
      class="form-check form-check-inline"
      v-for="type in types"
      :key="type.id"
    >
      <label class="form-check-label">
        <input
          class="form-check-input"
          type="checkbox"
          :value="type.id"
          @change="onChange"
        />
        {{ type.name }}
      </label>
    </div>
  </div>
</template>

<script>
export default {
  name: "TypeFilterButton",
  props: {
    types: {
      id: Number,
      name: String,
    },
	value: Array
  },
  data() {
    return {
      activeFilters: [],
    };
  },
  methods: {
    onChange(ev) {
      const checked = ev.target.checked;
      if (checked) {
        this.activeFilters.push(ev.target.value);
      } else {
        const index = this.activeFilters.indexOf(ev.target.value);
        this.activeFilters.splice(index, 1);
      }
      this.$emit("input", this.activeFilters);
    },
  },
};
</script>