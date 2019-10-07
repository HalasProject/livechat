<template>
  <div>
    <div class="list-group">
      <a
        v-for="(contact , index) in contacts"
        :key="contact.id"
        href="#"
        @click="contactClicked(index, contact)"
        :class="`list-group-item list-group-item-action ${index == selected ? 'active' : ''}`"
      >{{contact.name}}</a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    contacts: {
      required: true
    }
  },
  data() {
    return {
      selected: null
    };
  },
  methods: {
    contactClicked(index, contact) {
      this.selected = index;
      this.$emit("contactCliked", contact);
    }
  }
};
</script>

<style lang="css">
.list-group {
  overflow: overlay;
  max-height: 451px;
}
</style>