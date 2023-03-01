import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
const Index = ({ auth, Files }) => {
    console.log(Files);
    return (
        <AuthenticatedLayout auth={auth}>
            <div className="flex flex-col justify-center">
                <header className="flex flex-row justify-around">
                    <div>MR</div>
                    <h1>File Manager system</h1>
                    <div>
                        <button className="w-max p-2 border m-2 rounded-lg border-indigo-800  hover:bg-indigo-800 hover:text-white">
                            Create Dir
                        </button>
                        <button className="w-max p-2 border m-2 rounded-lg border-indigo-800  hover:bg-indigo-800 hover:text-white">
                            Create File
                        </button>
                        <button className="w-max p-2 border m-2 rounded-lg border-indigo-800  hover:bg-indigo-800 hover:text-white">
                            Upload Files
                        </button>
                    </div>
                </header>
                <table>
                    <tr className="border">
                        <th className="border bg-indigo-800 text-white">
                            name
                        </th>
                        <th className="border bg-indigo-800 text-white">
                            extension
                        </th>
                        <th className="border bg-indigo-800 text-white">
                            size
                        </th>
                    </tr>
                    {Files.map((item) => (
                        <tr>
                            <th className="border">{item.name}</th>
                            <th className="border">{item.extension}</th>
                            <th className="border">{item.size}</th>
                        </tr>
                    ))}
                </table>
            </div>
        </AuthenticatedLayout>
    );
};

export default Index;
