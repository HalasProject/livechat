<template>
  <div>
    <div v-if="contact" class="card">
      <div class="card-header">{{contact.name}}</div>
      <div class="messages card-body" ref="allMessage">
        <div
          v-for="message in messages"
          :key="message.id"
          :class="`alert ${message.from === 1 ? 'alert-secondary float-left' : 'alert-primary float-right'}`"
        >
          <div class="mb-1">{{message.content}}</div>
          <small class="text-muted">{{message.created_at}}</small>
        </div>
      </div>
      <div class="card-footer">
        <textarea
          @keydown.enter="send"
          class="form-control"
          v-model="msg"
          cols="55"
          rows="2"
        ></textarea>
      </div>
    </div>
    <div v-else>
      <h4>Hello in chat Live</h4>
    </div>
  </div>
</template>


<script>
export default {
  props: {
    messages: {},
    contact: {
      required: true
    }
  },
  mounted() {
  },
  data() {
    return {
      msg: ""
    };
  },
  methods: {
    send(e) {
      e.preventDefault();
      if (this.msg == "") {
        return;
      } else {
        this.$emit("newMessage", this.msg);
        this.msg = "";
      }
    },
    scrollToBottom() {
      setTimeout(() => {
        this.$refs.allMessage.scrollTop =
          this.$refs.allMessage.scrollHeight -
          this.$refs.allMessage.clientHeight;
      }, 50);
    }
  },
  watch: {
    messages(messages) {
      console.log("Ehoé Message");
      this.scrollToBottom();
    },
    contact(contact) {
      console.log("Ehoé Contact");
      this.scrollToBottom();
    }
  }
};
</script>

<style lang="css">
.messages {
  overflow: scroll;
  max-height: 22em;
}
</style>