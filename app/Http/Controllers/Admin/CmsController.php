<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CmsController extends Controller
{
    public function aboutUs(Request $request)
    {
        try {
            if ($request->method() == 'POST') {
                $rules = [
                    'banner_image' => 'nullable',
                    'banner_circle_title' => 'required',
                    'banner_circle_title_2' => 'required',
                    'banner_circle_text' => 'required',
                    'section_1_image' => 'nullable',
                    'section_1_title' => 'required',
                    'section_1_description' => 'required',
                    'section_1_title_2' => 'required',
                    'section_1_description_2_line_1' => 'required',
                    'section_1_description_2_line_2' => 'required',
                    'section_1_description_2_line_3' => 'required',
                    'section_1_description_2_line_4' => 'required',
                    'section_1_description_2_line_5' => 'required',
                    'section_2_image' => 'nullable',
                    'section_2_title' => 'required',
                    'section_2_description' => 'required',
                    'section_2_title_2' => 'required',
                    'section_2_description_2_line_1' => 'required',
                    'section_2_description_2_line_2' => 'required',
                    'section_2_description_2_line_3' => 'required',
                    'section_3_image' => 'nullable',
                    'section_3_title' => 'required',
                    'section_3_description' => 'required',
                    'section_4_image' => 'nullable',
                    'section_4_title' => 'required',
                    'section_4_description' => 'required',
                    'section_4_title_2' => 'required',
                    'section_4_description_2_line_1' => 'required',
                    'section_4_description_2_line_2' => 'required',
                    'section_4_description_2_line_3' => 'required',
                    'section_4_description_2_line_4' => 'required',
                    'section_4_description_2_line_5' => 'required',
                    'section_5_image' => 'nullable',
                    'section_5_title' => 'required',
                    'section_5_description_line_1' => 'required',
                    'section_5_description_line_2' => 'required',
                    'section_5_description_line_3' => 'required',
                    'section_5_description_line_4' => 'required',
                ];
                $customs = [];
                $validator = Validator::make($request->all(), $rules, $customs);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->getMessageBag()->first());
                }

                $about = Page::firstOrCreate([
                    'name' => 'About',
                    'slug' => 'about',
                ], []);

                //banner_image
                if($request->has('banner_image')) {
                    $about->clearMediaCollection('about_banner_images');
                    $about->addMediaFromRequest('banner_image')->toMediaCollection('about_banner_images');
                }
                //section_1_image
                if($request->has('section_1_image')) {
                    $about->clearMediaCollection('about_section_1_images');
                    $about->addMediaFromRequest('section_1_image')->toMediaCollection('about_section_1_images');
                }
                //section_2_image
                if($request->has('section_2_image')) {
                    $about->clearMediaCollection('about_section_2_images');
                    $about->addMediaFromRequest('section_2_image')->toMediaCollection('about_section_2_images');
                }
                //section_3_image
                if($request->has('section_3_image')) {
                    $about->clearMediaCollection('about_section_3_images');
                    $about->addMediaFromRequest('section_3_image')->toMediaCollection('about_section_3_images');
                }
                //section_4_image
                if($request->has('section_4_image')) {
                    $about->clearMediaCollection('about_section_4_images');
                    $about->addMediaFromRequest('section_4_image')->toMediaCollection('about_section_4_images');
                }
                //section_5_image
                if($request->has('section_5_image')) {
                    $about->clearMediaCollection('about_section_5_images');
                    $about->addMediaFromRequest('section_5_image')->toMediaCollection('about_section_5_images');
                }

                $content = [
                    'banner_image' => $about->getMedia('about_banner_images') && $about->getMedia('about_banner_images')->first() ? $about->getMedia('about_banner_images')->first()->getUrl() : asset('images/banner.jpg'),
                    'banner_circle_title' => $request['banner_circle_title'],
                    'banner_circle_title_2' => $request['banner_circle_title_2'],
                    'banner_circle_text' => $request['banner_circle_text'],
                    'section_1_image' => $about->getMedia('about_section_1_images') && $about->getMedia('about_section_1_images')->first() ? $about->getMedia('about_section_1_images')->first()->getUrl() : asset('images/abtImg.png'),
                    'section_1_title' => $request['section_1_title'],
                    'section_1_description' => $request['section_1_description'],
                    'section_1_title_2' => $request['section_1_title_2'],
                    'section_1_description_2_line_1' => $request['section_1_description_2_line_1'],
                    'section_1_description_2_line_2' => $request['section_1_description_2_line_2'],
                    'section_1_description_2_line_3' => $request['section_1_description_2_line_3'],
                    'section_1_description_2_line_4' => $request['section_1_description_2_line_4'],
                    'section_1_description_2_line_5' => $request['section_1_description_2_line_5'],
                    'section_2_image' => $about->getMedia('about_section_2_images') && $about->getMedia('about_section_2_images')->first() ? $about->getMedia('about_section_2_images')->first()->getUrl() : asset('images/abtImg2.png'),
                    'section_2_title' => $request['section_2_title'],
                    'section_2_description' => $request['section_2_description'],
                    'section_2_title_2' => $request['section_2_title_2'],
                    'section_2_description_2_line_1' => $request['section_2_description_2_line_1'],
                    'section_2_description_2_line_2' => $request['section_2_description_2_line_2'],
                    'section_2_description_2_line_3' => $request['section_2_description_2_line_3'],
                    'section_3_image' => $about->getMedia('about_section_3_images') && $about->getMedia('about_section_3_images')->first() ? $about->getMedia('about_section_3_images')->first()->getUrl() : asset('images/overlayBg.png'),
                    'section_3_title' => $request['section_3_title'],
                    'section_3_description' => $request['section_3_description'],
                    'section_4_image' => $about->getMedia('about_section_4_images') && $about->getMedia('about_section_4_images')->first() ? $about->getMedia('about_section_4_images')->first()->getUrl() : asset('images/abtImg3.png'),
                    'section_4_title' => $request['section_4_title'],
                    'section_4_description' => $request['section_4_description'],
                    'section_4_title_2' => $request['section_4_title_2'],
                    'section_4_description_2_line_1' => $request['section_4_description_2_line_1'],
                    'section_4_description_2_line_2' => $request['section_4_description_2_line_2'],
                    'section_4_description_2_line_3' => $request['section_4_description_2_line_3'],
                    'section_4_description_2_line_4' => $request['section_4_description_2_line_4'],
                    'section_4_description_2_line_5' => $request['section_4_description_2_line_5'],
                    'section_5_image' => $about->getMedia('about_section_5_images') && $about->getMedia('about_section_5_images')->first() ? $about->getMedia('about_section_5_images')->first()->getUrl() : asset('images/abtImg4.png'),
                    'section_5_title' => $request['section_5_title'],
                    'section_5_description_line_1' => $request['section_5_description_line_1'],
                    'section_5_description_line_2' => $request['section_5_description_line_2'],
                    'section_5_description_line_3' => $request['section_5_description_line_3'],
                    'section_5_description_line_4' => $request['section_5_description_line_4'],
                ];

                $about->content = json_encode($content);
                $about->save();

                return back()->with('success', 'Page Updated Successfully');
            }

            $about = Page::where('name', 'About')->first();
            $data = [];
            if ($about && $about->content) {
                $data = json_decode($about->content);
            }
            return view('admin.cms.about', compact('about', 'data'));
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function home(Request $request)
    {
        try {
            if ($request->method() == 'POST') {
                $rules = [
                    'banner_image' => 'nullable',
                    'banner_circle_title' => 'required',
                    'section_2_title' => 'required',
                    'section_2_element_1_text' => 'required',
                    'section_2_element_2_text' => 'required',
                    'section_2_element_3_text' => 'required',
                    'title' => 'required',
                    'element_1_image' => 'nullable',
                    'element_1_title' => 'required',
                    'element_1_description_line_1' => 'required',
                    'element_1_description_line_2' => 'required',
                    'element_1_description_line_3' => 'required',
                    'element_2_image' => 'nullable',
                    'element_2_title' => 'required',
                    'element_2_description' => 'required',
                    'element_3_image' => 'nullable',
                    'element_3_title' => 'required',
                    'element_3_description' => 'required',
                    'element_3_title_2' => 'required',
                    'element_3_image_2' => 'nullable',
                    'element_3_title_3' => 'required',
                    'element_3_description_2_line_1' => 'required',
                    'element_3_description_2_line_2' => 'required',
                    'element_3_description_2_line_3' => 'required',
                ];
                $customs = [];
                $validator = Validator::make($request->all(), $rules, $customs);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->getMessageBag()->first());
                }

                $home = Page::firstOrCreate([
                    'name' => 'Home',
                    'slug' => 'home',
                ], []);

                //banner_image
                if($request->has('banner_image')) {
                    $home->clearMediaCollection('home_banner_images');
                    $home->addMediaFromRequest('banner_image')->toMediaCollection('home_banner_images');
                }
                //element_1_image
                if($request->has('element_1_image')) {
                    $home->clearMediaCollection('home_element_1_images');
                    $home->addMediaFromRequest('element_1_image')->toMediaCollection('home_element_1_images');
                }
                //element_2_image
                if($request->has('element_2_image')) {
                    $home->clearMediaCollection('home_element_2_images');
                    $home->addMediaFromRequest('element_2_image')->toMediaCollection('home_element_2_images');
                }
                //element_3_image
                if($request->has('element_3_image')) {
                    $home->clearMediaCollection('home_element_3_images');
                    $home->addMediaFromRequest('element_3_image')->toMediaCollection('home_element_3_images');
                }
                //element_3_image_2
                if($request->has('element_3_image_2')) {
                    $home->clearMediaCollection('home_element_3_image_2s');
                    $home->addMediaFromRequest('element_3_image_2')->toMediaCollection('home_element_3_image_2s');
                }
                //section_3_plan_1_image
                if($request->has('section_3_plan_1_image')) {
                    $home->clearMediaCollection('home_section_3_plan_1_images');
                    $home->addMediaFromRequest('section_3_plan_1_image')->toMediaCollection('home_section_3_plan_1_images');
                }
                //section_3_plan_2_image
                if($request->has('section_3_plan_2_image')) {
                    $home->clearMediaCollection('home_section_3_plan_2_images');
                    $home->addMediaFromRequest('section_3_plan_2_image')->toMediaCollection('home_section_3_plan_2_images');
                }
                //section_3_plan_3_image
                if($request->has('section_3_plan_3_image')) {
                    $home->clearMediaCollection('home_section_3_plan_3_images');
                    $home->addMediaFromRequest('section_3_plan_3_image')->toMediaCollection('home_section_3_plan_3_images');
                }
                //section_3_plan_4_image
                if($request->has('section_3_plan_4_image')) {
                    $home->clearMediaCollection('home_section_3_plan_4_images');
                    $home->addMediaFromRequest('section_3_plan_4_image')->toMediaCollection('home_section_3_plan_4_images');
                }
                //section_3_plan_5_image
                if($request->has('section_3_plan_5_image')) {
                    $home->clearMediaCollection('home_section_3_plan_5_images');
                    $home->addMediaFromRequest('section_3_plan_5_image')->toMediaCollection('home_section_3_plan_5_images');
                }

                $content = [
                    'banner_image' => $home->getMedia('home_banner_images') && $home->getMedia('home_banner_images')->first() ? $home->getMedia('home_banner_images')->first()->getUrl() : asset('images/banner.jpg'),
                    'banner_circle_title' => $request['banner_circle_title'],
                    'section_2_title' => $request['section_2_title'],
                    'section_2_element_1_text' => $request['section_2_element_1_text'],
                    'section_2_element_2_text' => $request['section_2_element_2_text'],
                    'section_2_element_3_text' => $request['section_2_element_3_text'],
                    'title' => $request['title'],
                    'element_1_image' => $home->getMedia('home_element_1_images') && $home->getMedia('home_element_1_images')->first() ? $home->getMedia('home_element_1_images')->first()->getUrl() : asset('images/benefit1.jpg'),
                    'element_1_title' => $request['element_1_title'],
                    'element_1_description_line_1' => $request['element_1_description_line_1'],
                    'element_1_description_line_2' => $request['element_1_description_line_2'],
                    'element_1_description_line_3' => $request['element_1_description_line_3'],
                    'element_2_image' => $home->getMedia('home_element_2_images') && $home->getMedia('home_element_2_images')->first() ? $home->getMedia('home_element_2_images')->first()->getUrl() : asset('images/benefit2.jpg'),
                    'element_2_title' => $request['element_2_title'],
                    'element_2_description' => $request['element_2_description'],
                    'element_3_image' => $home->getMedia('home_element_3_images') && $home->getMedia('home_element_3_images')->first() ? $home->getMedia('home_element_3_images')->first()->getUrl() : asset('images/benefit3.jpg'),
                    'element_3_title' => $request['element_3_title'],
                    'element_3_description' => $request['element_3_description'],
                    'element_3_title_2' => $request['element_3_title_2'],
                    'element_3_image_2' => $home->getMedia('home_element_3_image_2s') && $home->getMedia('home_element_3_image_2s')->first() ? $home->getMedia('home_element_3_image_2s')->first()->getUrl() : asset('images/character.png'),
                    'element_3_title_3' => $request['element_3_title_3'],
                    'element_3_description_2_line_1' => $request['element_3_description_2_line_1'],
                    'element_3_description_2_line_2' => $request['element_3_description_2_line_2'],
                    'element_3_description_2_line_3' => $request['element_3_description_2_line_3'],
                    'section_3_plan_1_image' => $home->getMedia('home_section_3_plan_1_images') && $home->getMedia('home_section_3_plan_1_images')->first() ? $home->getMedia('home_section_3_plan_1_images')->first()->getUrl() : asset('images/plan1.jpg'),
                    'section_3_plan_2_image' => $home->getMedia('home_section_3_plan_2_images') && $home->getMedia('home_section_3_plan_2_images')->first() ? $home->getMedia('home_section_3_plan_2_images')->first()->getUrl() : asset('images/plan2.jpg'),
                    'section_3_plan_3_image' => $home->getMedia('home_section_3_plan_3_images') && $home->getMedia('home_section_3_plan_3_images')->first() ? $home->getMedia('home_section_3_plan_3_images')->first()->getUrl() : asset('images/plan3.jpg'),
                    'section_3_plan_4_image' => $home->getMedia('home_section_3_plan_4_images') && $home->getMedia('home_section_3_plan_4_images')->first() ? $home->getMedia('home_section_3_plan_4_images')->first()->getUrl() : asset('images/plan4.jpg'),
                    'section_3_plan_5_image' => $home->getMedia('home_section_3_plan_5_images') && $home->getMedia('home_section_3_plan_5_images')->first() ? $home->getMedia('home_section_3_plan_5_images')->first()->getUrl() : asset('images/plan5.jpg'),
                    'section_3_title' => $request['section_3_title'],
                    'section_3_description_line_1' => $request['section_3_description_line_1'],
                    'section_3_description_line_2' => $request['section_3_description_line_2'],
                    'section_3_description_line_3' => $request['section_3_description_line_3'],
                ];

                $home->content = json_encode($content);
                $home->save();

                return back()->with('success', 'Page Updated Successfully');
            }

            $home = Page::where('name', 'Home')->first();
            $data = [];
            if ($home && $home->content) {
                $data = json_decode($home->content);
            }
            return view('admin.cms.home', compact('home', 'data'));
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function benefits(Request $request)
    {
        try {
            if ($request->method() == 'POST') {
                $rules = [
                    'banner_image' => 'nullable',
                    'banner_circle_title' => 'required',
                    'section_2_image' => 'nullable',
                    'section_2_title' => 'required',
                    'section_2_description_line_1' => 'required',
                    'section_2_description_line_2' => 'required',
                    'section_2_description_line_3' => 'required',
                    'section_3_image' => 'nullable',
                    'section_3_title' => 'required',
                    'section_3_description' => 'required',
                    'section_4_image' => 'nullable',
                    'section_4_title' => 'required',
                    'section_4_description_line_1' => 'required',
                    'section_4_description_line_2' => 'required',
                    'section_4_title_2' => 'required',
                    'section_4_image_2' => 'nullable',
                    'section_4_title_3' => 'required',
                    'section_4_description_2_line_1' => 'required',
                    'section_4_description_2_line_2' => 'required',
                    'section_4_description_2_line_3' => 'required',
                ];
                $customs = [];
                $validator = Validator::make($request->all(), $rules, $customs);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->getMessageBag()->first());
                }

                $benefits = Page::firstOrCreate([
                    'name' => 'Benefits',
                    'slug' => 'benefits',
                ], []);

                //banner_image
                if($request->has('banner_image')) {
                    $benefits->clearMediaCollection('benefits_banner_images');
                    $benefits->addMediaFromRequest('banner_image')->toMediaCollection('benefits_banner_images');
                }
                //section_2_image
                if($request->has('section_2_image')) {
                    $benefits->clearMediaCollection('benefits_section_2_images');
                    $benefits->addMediaFromRequest('section_2_image')->toMediaCollection('benefits_section_2_images');
                }
                //section_3_image
                if($request->has('section_3_image')) {
                    $benefits->clearMediaCollection('benefits_section_3_images');
                    $benefits->addMediaFromRequest('section_3_image')->toMediaCollection('benefits_section_3_images');
                }
                //section_4_image
                if($request->has('section_4_image')) {
                    $benefits->clearMediaCollection('benefits_section_4_images');
                    $benefits->addMediaFromRequest('section_4_image')->toMediaCollection('benefits_section_4_images');
                }
                //section_4_image_2
                if($request->has('section_4_image_2')) {
                    $benefits->clearMediaCollection('benefits_section_4_image_2s');
                    $benefits->addMediaFromRequest('section_4_image_2')->toMediaCollection('benefits_section_4_image_2s');
                }

                $content = [
                    'banner_image' => $benefits->getMedia('benefits_banner_images') && $benefits->getMedia('benefits_banner_images')->first() ? $benefits->getMedia('benefits_banner_images')->first()->getUrl() : asset('images/banner.jpg'),
                    'banner_circle_title' => $request['banner_circle_title'],
                    'section_2_image' => $benefits->getMedia('benefits_section_2_images') && $benefits->getMedia('benefits_section_2_images')->first() ? $benefits->getMedia('benefits_section_2_images')->first()->getUrl() : asset('images/benefit1.png'),
                    'section_2_title' => $request['section_2_title'],
                    'section_2_description_line_1' => $request['section_2_description_line_1'],
                    'section_2_description_line_2' => $request['section_2_description_line_2'],
                    'section_2_description_line_3' => $request['section_2_description_line_3'],
                    'section_3_image' => $benefits->getMedia('benefits_section_3_images') && $benefits->getMedia('benefits_section_3_images')->first() ? $benefits->getMedia('benefits_section_3_images')->first()->getUrl() : asset('images/benefit2.jpg'),
                    'section_3_title' => $request['section_3_title'],
                    'section_3_description' => $request['section_3_description'],
                    'section_4_image' => $benefits->getMedia('benefits_section_4_images') && $benefits->getMedia('benefits_section_4_images')->first() ? $benefits->getMedia('benefits_section_4_images')->first()->getUrl() : asset('images/benefit3.jpg'),
                    'section_4_title' => $request['section_4_title'],
                    'section_4_description_line_1' => $request['section_4_description_line_1'],
                    'section_4_description_line_2' => $request['section_4_description_line_2'],
                    'section_4_title_2' => $request['section_4_title_2'],
                    'section_4_image_2' => $benefits->getMedia('benefits_section_4_image_2s') && $benefits->getMedia('benefits_section_4_image_2s')->first() ? $benefits->getMedia('benefits_section_4_image_2s')->first()->getUrl() : asset('images/character.png'),
                    'section_4_title_3' => $request['section_4_title_3'],
                    'section_4_description_2_line_1' => $request['section_4_description_2_line_1'],
                    'section_4_description_2_line_2' => $request['section_4_description_2_line_2'],
                    'section_4_description_2_line_3' => $request['section_4_description_2_line_3'],
                ];

                $benefits->content = json_encode($content);
                $benefits->save();

                return back()->with('success', 'Page Updated Successfully');
            }

            $benefits = Page::where('name', 'Benefits')->first();
            $data = [];
            if ($benefits && $benefits->content) {
                $data = json_decode($benefits->content);
            }
            return view('admin.cms.benefits', compact('benefits', 'data'));
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function terms(Request $request)
    {
        try {
            if ($request->method() == 'POST') {
                $rules = [
                    'banner_image' => 'nullable',
                    'banner_circle_title' => 'required',
                    'terms_content' => 'required',
                ];
                $customs = [];
                $validator = Validator::make($request->all(), $rules, $customs);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->getMessageBag()->first());
                }

                $terms = Page::firstOrCreate([
                    'name' => 'Benefits',
                    'slug' => 'terms',
                ], []);

                //banner_image
                if($request->has('banner_image')) {
                    $terms->clearMediaCollection('terms_banner_images');
                    $terms->addMediaFromRequest('banner_image')->toMediaCollection('terms_banner_images');
                }

                $content = [
                    'banner_image' => $terms->getMedia('terms_banner_images') && $terms->getMedia('terms_banner_images')->first() ? $terms->getMedia('terms_banner_images')->first()->getUrl() : asset('images/banner.jpg'),
                    'banner_circle_title' => $request['banner_circle_title'],
                    'terms_content' => $request['terms_content'],
                ];

                $terms->content = json_encode($content);
                $terms->save();

                return back()->with('success', 'Page Updated Successfully');
            }

            $terms = Page::where('name', 'Terms')->first();
            $data = [];
            if ($terms && $terms->content) {
                $data = json_decode($terms->content);
            }
            return view('admin.cms.terms', compact('terms', 'data'));
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function privacy(Request $request)
    {
        try {
            if ($request->method() == 'POST') {
                $rules = [
                    'banner_image' => 'nullable',
                    'banner_circle_title' => 'required',
                    'terms_content' => 'required',
                ];
                $customs = [];
                $validator = Validator::make($request->all(), $rules, $customs);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->getMessageBag()->first());
                }

                $privacy = Page::firstOrCreate([
                    'name' => 'Privacy',
                    'slug' => 'privacy',
                ], []);

                //banner_image
                if($request->has('banner_image')) {
                    $privacy->clearMediaCollection('privacy_banner_images');
                    $privacy->addMediaFromRequest('banner_image')->toMediaCollection('privacy_banner_images');
                }

                $content = [
                    'banner_image' => $privacy->getMedia('privacy_banner_images') && $privacy->getMedia('privacy_banner_images')->first() ? $privacy->getMedia('privacy_banner_images')->first()->getUrl() : asset('images/banner.jpg'),
                    'banner_circle_title' => $request['banner_circle_title'],
                    'privacy_content' => $request['privacy_content'],
                ];

                $privacy->content = json_encode($content);
                $privacy->save();

                return back()->with('success', 'Page Updated Successfully');
            }

            $privacy = Page::where('name', 'Privacy')->first();
            $data = [];
            if ($privacy && $privacy->content) {
                $data = json_decode($privacy->content);
            }
            return view('admin.cms.privacy', compact('privacy', 'data'));
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function contact(Request $request)
    {
        try {
            if ($request->method() == 'POST') {
                $rules = [
                    'banner_image' => 'nullable',
                    'banner_circle_title' => 'required',
                    'banner_circle_title_2' => 'required',
                    'banner_circle_text' => 'required',
                ];
                $customs = [];
                $validator = Validator::make($request->all(), $rules, $customs);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->getMessageBag()->first());
                }

                $contact = Page::firstOrCreate([
                    'name' => 'Contact',
                    'slug' => 'contact',
                ], []);

                //banner_image
                if($request->has('banner_image')) {
                    $contact->clearMediaCollection('contact_banner_images');
                    $contact->addMediaFromRequest('banner_image')->toMediaCollection('contact_banner_images');
                }

                $content = [
                    'banner_image' => $contact->getMedia('contact_banner_images') && $contact->getMedia('contact_banner_images')->first() ? $contact->getMedia('contact_banner_images')->first()->getUrl() : asset('images/banner.jpg'),
                    'banner_circle_title' => $request['banner_circle_title'],
                    'banner_circle_title_2' => $request['banner_circle_title_2'],
                    'banner_circle_text' => $request['banner_circle_text'],
                ];

                $contact->content = json_encode($content);
                $contact->save();

                return back()->with('success', 'Page Updated Successfully');
            }

            $contact = Page::where('name', 'Contact')->first();
            $data = [];
            if ($contact && $contact->content) {
                $data = json_decode($contact->content);
            }
            return view('admin.cms.contact', compact('contact', 'data'));
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }
}
