<template>
  <div class="wrap">
    <div class="container content">
      <section class="page_header page_header--contact">
        <h1 class="page_title">
          Let's talk !
        </h1>

        <p class="page_summary page_summary--contact">
          Want to talk about you next project, or maybe just to ask a question? Please fill out the contact form below.
        </p>
      </section>

      <section class="content content--contact">
        <div class="contact_form">
          <div v-if="!success">
            <form @submit.prevent="sendEmail">
              <!-- <?php if ($response !== '') echo generate_response('error', $response); ?> -->
              <p>
                <label for="form_name">
                  Name<span> *</span>
                </label>
                <input
                  v-model="contactName"
                  class="required"
                  minlength="3"
                  type="text"
                  name="contact_name"
                  required
                >
              </p>
              <p>
                <label for="form_email">
                  Email<span> *</span>
                </label>
                <input
                  v-model="contactEmail"
                  class="required"
                  type="email"
                  name="contact_email"
                  required
                >
              </p>
              <p>
                <label for="form_message">
                  Message<span> *</span>
                </label>
                <textarea
                  v-model="contactMessage"
                  class="required"
                  minlength="5"
                  name="contact_message"
                  required
                ></textarea>
              </p>
              <p>
                <label for="message_human">
                  Robot check<span> *</span>
                </label>
                <input
                  id="message_human"
                  v-model="messageHuman"
                  class="required"
                  type="text"
                  name="message_human"
                  required
                >
                <span id="human_op">+ 3 = <strong>5</strong></span>
              </p>
              <input
                type="submit"
                class="button"
                value="Send"
              >
              <input
                type="hidden"
                name="form_sub"
                value="1"
              >
            </form>
          </div>
          <div v-else class="success">
            <h2>
              Success!
            </h2>
            <p>
              Thanks, your message was sent and I'll get back to you ASAP.
            </p>
          </div>
        </div>

        <div class="contact_sidebar">
          <p>
            I am best contacted by email. If you have a general enquiry, please include as much detail as possible in the message field.
          </p>
          <p>
            Alternatively, you can shoot me an email to <a href="mailto:fabpallaud@gmail.com">fabpallaud@gmail.com</a>.
          </p>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      success: false,
      contactName: null,
      contactEmail: null,
      contactMessage: null,
      messageHuman: null
    }
  },
  methods: {
    sendEmail () {
      const formData = new FormData()
      formData.append('contact_name', this.contactName)
      formData.append('contact_email', this.contactEmail)
      formData.append('contact_message', this.contactMessage)

      this.$axios.$put(`${this.baseUrl}/wp-json/contact/v1/send`, formData)
        .then((res) => {
          this.success = true
        })
        .catch((err) => {
          this.$toast.error(err.response)
        })
    }
  }
}
</script>

<style lang="scss">
.page_header.page_header--contact {
  padding-right: 30%;
  background: url(~assets/img/pouf.png) right -13px no-repeat;
  min-height: 195px;
  margin-bottom: 40px;
  overflow: auto;
  @include media_768 {
    min-height: 0;
  }
}

.content--contact {
  display: flex;
  justify-content: space-between;
}

.page_summary--contact {
  width: 85%;
}

.contact_form {
  width: 54%;
  padding-bottom: 2px;
  @include media_768 {
    width: 100%;
  }
}

.contact_sidebar {
  width: 38%;
  padding-top: 30px;
  @include media_768 {
    display: none;
  }
}

#message_human {
  width: 40px;
  display: inline;
  margin-right: 10px;
}

.contact_sidebar img {
  border: 1px solid $gray8;
  margin-top: 10px;
}

.contact_form input[type=submit] {
  margin-top: 50px;
}

.error,
.contact_success {
  font-size: 1.5em;
  margin-bottom: 1em;
}

.error {
  color: $red;
}

.contact_success {
  margin-bottom: 5em;
}

.contact_success div,
.contact_success strong {
  @include subsection_heading;
  line-height: 2.2;
  @include media_768 {
    line-height: 1.5;
  }
}

.contact_success strong {
  color: $green;
  display: block;
  @include home_heading;
  @include media_768 {
    margin-bottom: 20px;
  }
}

.success {
  background-color: $green_transparent;
  padding: 30px;
  border-radius: 3px;

  h2,
  p {
    color: $green;
  }
}
</style>
