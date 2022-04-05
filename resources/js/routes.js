import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import HomePage from "./components/pages/HomePage";
import ContactPage from "./components/pages/ContactPage";
import NotFoundPage from "./components/pages/NotFoundPage";
import PostDetailPage from "./components/pages/PostDetailPage";
const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [
        { path: "/", component: HomePage },
        { path: "/contacts", component: ContactPage },
        { path: "/posts/:id", component: PostDetailPage, name: "post-detail" },
        { path: "*", component: NotFoundPage },
    ],
});

export default router;
