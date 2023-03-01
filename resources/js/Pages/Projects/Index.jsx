import { useEffect, useState } from "react";
import { router } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import InputError from "@/Components/InputError";
import PrimaryButton from "@/Components/PrimaryButton";
import { useForm, Head } from "@inertiajs/react";

const Index = ({ projectslist, auth }) => {
    const [values, setValues] = useState({
        description: "",
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value;
        setValues((values) => ({
            ...values,
            [key]: value,
        }));
    }

    function handleSubmit(e) {
        e.preventDefault();
        router.post("/Projects", values);
    }
    function DestroyClick(id) {
        router.delete(`/Projects/${id}`);
        console.log(id);
    }
    return (
        <AuthenticatedLayout auth={auth}>
            <Head title="Chirps" />
            <div className="flex flex-col justify-center items-center">
                <form
                    onSubmit={handleSubmit}
                    className="flex flex-col w-96 border-red-500 rounded-md p-10"
                >
                    <label htmlFor="description">description:</label>
                    <textarea
                        className="border rounded"
                        id="description"
                        value={values.description}
                        onChange={handleChange}
                        cols="30"
                        rows="10"
                    ></textarea>
                    <button
                        type="submit"
                        className="bg-indigo-600 m-2 py-3 rounded-lg text-white"
                    >
                        Submit
                    </button>
                </form>
                <div className="justify-center items-center flex flex-col">
                    <h1>Index Page to Show List of Projects</h1>
                    <div className="grid grid-cols-3">
                        {projectslist.map((item) => (
                            <div className="w-56 border border-indigo-900 m-3 p-3 rounded-xl">
                                <div key={item.id}>
                                    <div className="flex flex-row justify-between items-center">
                                        <span className="text-red-500">
                                            Id:
                                        </span>
                                    </div>
                                    <h1> {item.id}</h1>
                                    <span className="text-red-500">
                                        Message:
                                    </span>
                                    <p>{item.message}</p>

                                    <button className="bg-green-600 text-white p-1 rounded-lg my-2">
                                        Edit
                                    </button>
                                    <button
                                        className="bg-red-600 text-white p-1 rounded-lg my-2 mx-2"
                                        onClick={() => DestroyClick(item.id)}
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default Index;
