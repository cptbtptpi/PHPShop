<?php
namespace System\Controller;

class ComponentController {
	//字体列表
	public function font() {
		return view();
	}
	//上传图片webuploader
	public function uploader() {
		$file = $this->upload();
//		dump($file);exit;
		if ( $file['valid'] ) {
			$data = [
				'uid'        => '',//可以取自session
				'name'       => $file['message']['name'],
				'filename'   => $file['message']['savename'],
				'path'       => $file['message']['savepath'],
				'extension'  => strtolower( $file['message']['ext'] ),
				'createtime' => time(),
				'size'       => $file['message']['size'],
				'data'       => '',
				'hash'       => ''
			];
			m( 'core_attachment' )->add( $data );
			echo json_encode( [ 'valid' => 1, 'message' =>__ROOT__ . '/Uploads/'.$data['path'].$data['filename'] ] );exit;
		} else {
			echo json_encode( [ 'valid' => 0, 'message' => $file['message'] ] );exit;
		}
	}
	//thinkphp上传方法
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件
		$info   =   $upload->upload();
//		dump($info);exit;
		if(!$info) {// 上传错误提示错误信息
			return ['valid'=>0,'message'=>$upload->getError()];
			//$this->error($upload->getError());
		}else{// 上传成功
			return ['valid'=>1,'message'=>current($info)];
			//$this->success('上传成功！');
		}
	}






	//获取文件列表webuploader
	public function filesLists() {
		$db = Db::table( 'core_attachment' )
			->whereIn( 'extension', explode( ',', strtolower( $_GET['extensions'] ) ) )
			->orderBy( 'id', 'DESC' );
		$data = $db->get();
		if ( $data ) {
			foreach ( $data as $k => $v ) {
				$data[ $k ]['createtime'] = date( 'Y/m/d', $v['createtime'] );
				$data[ $k ]['size']       = Tool::getSize( $v['size'] );
			}
		}
		ajax( [ 'data' => $data ?: [ ], 'page' => $db->links() ] );
	}

	//删除图片delWebuploader
	public function removeImage() {
		$db   = Db::table( 'core_attachment' );
		$file = $db->where( 'id', $_POST['id'] )->first();
		if ( is_file( $file['path'] ) ) {
			unlink( $file['path'] );
		}
		$db->where( 'id', $_POST['id'] )->delete();
	}

	//百度编辑器
	public function ueditor() {
		$path   = ROOT_PATH . '/resource/hdjs/component/ueditor';
		$CONFIG = json_decode( preg_replace( "/\/\*[\s\S]+?\*\//", "", file_get_contents( $path . "/php/config.json" ) ), TRUE );
		$action = $_GET['action'];
		switch ( $action ) {
			case 'config':
				$result = json_encode( $CONFIG );
				break;
			/* 上传图片 */
			case 'uploadimage':
				/* 上传涂鸦 */
			case 'uploadscrawl':
				/* 上传视频 */
			case 'uploadvideo':
				/* 上传文件 */
			case 'uploadfile':
				$result = include( $path . "/php/action_upload.php" );
				break;

			/* 列出图片 */
			case 'listimage':
				$result = include( $path . "/php/action_list.php" );
				break;
			/* 列出文件 */
			case 'listfile':
				$result = include( $path . "/php/action_list.php" );
				break;

			/* 抓取远程文件 */
			case 'catchimage':
				$result = include( $path . "/php/action_crawler.php" );
				break;

			default:
				$result = json_encode( [
					'state' => '请求地址出错'
				] );
				break;
		}
		/* 输出结果 */
		if ( isset( $_GET["callback"] ) ) {
			if ( preg_match( "/^[\w_]+$/", $_GET["callback"] ) ) {
				echo htmlspecialchars( $_GET["callback"] ) . '(' . $result . ')';
			} else {
				echo json_encode( [
					'state' => 'callback参数不合法'
				] );
			}
		} else {
			echo $result;
		}
	}
}