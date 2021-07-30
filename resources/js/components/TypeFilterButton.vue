<template>
  <div class="row">
      <div class="btn-group btn-group-toggle col-3" data-toggle="buttons" v-for="type in types" :key="type.id">         
          <label class="btn btn-secondary button_style">{{ type.name }}
            <input type="checkbox" autocomplete="off" :value="type.id"
                    @change="onChange"> 
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