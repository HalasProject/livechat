<template>
  <div>
    <div class="row">
      <div class="col-sm-4">
        <contact @contactCliked="StartConversation" :contacts="contactsList"></contact>
      </div>
      <div class="col-sm-8">
        <message @newMessage="sendMessage" :messages="messageList" :contact="currentContact"></message>
      </div>
    </div>
  </div>
</template>

<script>
import contact from "./contact";
import message from "./message";
export default {
  components: { contact, message },
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  mounted() {
    axios.get("contact/all").then(response => {
      this.contactsList = response.data;
    });

  },
  data() {
    return {
      currentContact: null,
      messageList: [],
      contactsList: []
    };
  },
  methods: {
    StartConversation(contact) {
      axios.get("message/" + contact.id).then(response => {
        this.messageList = response.data;
        this.currentContact = contact;
      });
    },
    sendMessage(message){
      axios.post('message/add',{
        contact_id: this.currentContact.id,
        content: message
      }).then(response => {
        this.messageList.push(response.data);
      })
    }
  }
};
</script>
